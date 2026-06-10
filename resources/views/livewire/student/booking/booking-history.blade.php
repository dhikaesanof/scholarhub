<div
    class="
        -m-10
        min-h-full
        bg-scholarhub-background
        text-scholarhub-primary
    "
>

    {{-- HEADER --}}

    <header
        class="
            flex
            items-center
            gap-4
            px-8
            py-6
        "
    >

        <a
            href="/mentors"
            aria-label="Back to mentors"
            class="
                flex
                h-12
                w-12
                items-center
                justify-center
                rounded-md
                transition
                hover:bg-scholarhub-border
            "
        >

            <x-lucide-arrow-left class="h-6 w-6" />

        </a>

        <h1
            class="
                text-[25px]
                font-bold
                leading-[1.2]
            "
        >

            Booking History

        </h1>

    </header>

    @if(session()->has('success') || session()->has('error'))

        <div class="px-8 pb-4">

            @if(session()->has('success'))

                <div
                    class="
                        rounded-lg
                        border
                        border-green-200
                        bg-green-50
                        p-4
                        text-sm
                        font-medium
                        text-green-700
                    "
                >

                    {{ session('success') }}

                </div>

            @endif

            @if(session()->has('error'))

                <div
                    class="
                        rounded-lg
                        border
                        border-red-200
                        bg-red-50
                        p-4
                        text-sm
                        font-medium
                        text-red-700
                    "
                >

                    {{ session('error') }}

                </div>

            @endif

        </div>

    @endif

    <main
        class="
            grid
            grid-cols-1
            gap-6
            px-8
            pb-8
            md:grid-cols-2
            xl:grid-cols-3
        "
    >

        @forelse($bookings as $booking)

            @php
                $availability = $booking->availability;
                $mentor = $booking->mentor;
                $sessionEnd = $availability
                    ? \Carbon\Carbon::parse(
                        $availability->date . ' ' . $availability->end_time
                    )
                    : null;
                $sessionEnded = $sessionEnd
                    ? now()->greaterThan($sessionEnd)
                    : false;
                $alreadyReviewed =
                    \App\Models\MentorReview::where(
                        'mentor_booking_id',
                        $booking->id
                    )->exists();
                $sessionStatus = $sessionEnded
                    ? 'Completed'
                    : (
                        $booking->session_status
                            ? ucfirst(strtolower($booking->session_status))
                            : 'Upcoming'
                    );
                $paymentStatus =
                    ucfirst(strtolower($booking->payment_status));
            @endphp

            <article
                class="
                    flex
                    min-h-[260px]
                    flex-col
                    justify-between
                    gap-4
                    overflow-hidden
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-4
                "
            >

                <div
                    class="
                        flex
                        flex-col
                        gap-4
                    "
                >

                    @if($mentor->user->profile_photo)

                        <img
                            src="{{
                                Str::startsWith(
                                    $mentor->user->profile_photo,
                                    'http'
                                )
                                    ? $mentor->user->profile_photo
                                    : asset(
                                        'storage/' .
                                        $mentor->user->profile_photo
                                    )
                            }}"
                            alt="{{ $mentor->user->name }}"
                            class="
                                h-20
                                w-20
                                rounded-lg
                                object-cover
                            "
                        >

                    @else

                        <div
                            aria-hidden="true"
                            class="
                                h-20
                                w-20
                                rounded-lg
                                bg-[#d9d9d9]
                            "
                        ></div>

                    @endif

                    <div
                        class="
                            flex
                            min-w-0
                            flex-col
                            gap-2
                        "
                    >

                        <h2
                            class="
                                truncate
                                text-xl
                                font-semibold
                                leading-[1.2]
                            "
                        >

                            {{ $mentor->user->name }}

                        </h2>

                        <p
                            class="
                                truncate
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                            "
                        >

                            @if($availability)

                                {{
                                    \Carbon\Carbon::parse(
                                        $availability->date
                                    )->format('j M')
                                }}
                                ·
                                {{
                                    \Carbon\Carbon::parse(
                                        $availability->start_time
                                    )->format('H:i')
                                }}-{{
                                    \Carbon\Carbon::parse(
                                        $availability->end_time
                                    )->format('H:i')
                                }}

                            @else

                                Schedule unavailable

                            @endif

                        </p>

                        <p
                            class="
                                truncate
                                text-[13px]
                                font-medium
                                leading-[1.2]
                                text-scholarhub-muted
                            "
                        >

                            {{ $booking->topic }}

                        </p>

                    </div>

                    <div
                        class="
                            flex
                            flex-wrap
                            gap-2
                        "
                    >

                        <span
                            class="
                                rounded-[26px]
                                px-3
                                py-1
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                {{
                                    $sessionEnded
                                        ? 'bg-scholarhub-active/70 text-scholarhub-primary'
                                        : 'bg-scholarhub-rating-bg text-scholarhub-rating-text'
                                }}
                            "
                        >

                            {{ $sessionStatus }}

                        </span>

                        <span
                            class="
                                rounded-[26px]
                                px-3
                                py-1
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                {{
                                    $booking->payment_status === 'PAID'
                                        ? 'bg-scholarhub-success-soft text-scholarhub-success-dark'
                                        : 'bg-scholarhub-rating-bg text-scholarhub-rating-text'
                                }}
                            "
                        >

                            {{ $paymentStatus }}

                        </span>

                    </div>

                </div>

                <div
                    class="
                        flex
                        gap-2
                        border-t
                        border-scholarhub-border
                        pt-4
                    "
                >

                    @if($booking->payment_status === 'PENDING')

                        <button
                            type="button"
                            wire:click="continuePayment({{ $booking->id }})"
                            class="
                                flex
                                h-9
                                flex-1
                                items-center
                                justify-center
                                rounded-lg
                                bg-scholarhub-primary
                                px-6
                                py-2.5
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-background
                            "
                        >

                            Continue Payment

                        </button>

                        <button
                            type="button"
                            wire:click="cancelBooking({{ $booking->id }})"
                            class="
                                flex
                                h-9
                                flex-1
                                items-center
                                justify-center
                                rounded-lg
                                bg-red-600
                                px-6
                                py-2.5
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                text-white
                            "
                        >

                            Cancel

                        </button>

                    @else

                        <a
                            href="/student/bookings/{{ $booking->id }}"
                            class="
                                flex
                                h-9
                                flex-1
                                items-center
                                justify-center
                                rounded-lg
                                bg-scholarhub-primary
                                px-6
                                py-2.5
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-background
                            "
                        >

                            View Session

                        </a>

                        @if(
                            $booking->payment_status === 'PAID'
                            && $sessionEnded
                            && !$alreadyReviewed
                        )

                            <button
                                type="button"
                                wire:click="leaveReview({{ $booking->id }})"
                                class="
                                    flex
                                    h-9
                                    flex-1
                                    items-center
                                    justify-center
                                    rounded-lg
                                    bg-[#df900a]
                                    px-6
                                    py-2.5
                                    text-[13px]
                                    font-semibold
                                    leading-[1.2]
                                    text-scholarhub-background
                                "
                            >

                                Leave a Review

                            </button>

                        @elseif($alreadyReviewed)

                            <span
                                class="
                                    flex
                                    h-9
                                    flex-1
                                    items-center
                                    justify-center
                                    rounded-lg
                                    bg-[#fad28f]
                                    px-6
                                    py-2.5
                                    text-[13px]
                                    font-semibold
                                    leading-[1.2]
                                    text-[#875706]
                                "
                            >

                                Reviewed

                            </span>

                        @endif

                    @endif

                </div>

            </article>

        @empty

            <div
                class="
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-6
                    text-[13px]
                    font-medium
                    leading-[1.2]
                    text-scholarhub-muted
                    md:col-span-2
                    xl:col-span-3
                "
            >

                No bookings yet.

            </div>

        @endforelse

    </main>

    @include(
        'livewire.student.booking.partials.payment-modal'
    )

    @include(
        'livewire.student.booking.partials.review-modal'
    )

</div>
