<div
    class="
        -m-10
        min-h-full
        bg-scholarhub-background
        text-scholarhub-primary
    "
>

    @php
        $mentor = $availability->mentor;
        $booking = $this->booking;
        $summaryAvailability = $booking?->availability ?? $availability;
        $summaryMentor = $booking?->mentor ?? $mentor;
        $dateLabel = \Carbon\Carbon::parse($summaryAvailability->date)->format('jS F Y');
        $timeLabel =
            \Carbon\Carbon::parse($summaryAvailability->start_time)->format('g.i') .
            '-' .
            \Carbon\Carbon::parse($summaryAvailability->end_time)->format('g.i A');
        $priceLabel = 'Rp' . number_format($this->price, 0, ',', '.');
    @endphp

    {{-- HEADER --}}

    <header
        class="
            sticky
            top-0
            z-20
            flex
            items-center
            gap-4
            border-b-2
            border-scholarhub-border
            bg-scholarhub-background
            px-8
            py-5
        "
    >

        @if($step === 'booking')

            <a
                href="/mentors/{{ $mentor->id }}"
                aria-label="Back to mentor detail"
                class="
                    flex
                    h-12
                    w-12
                    items-center
                    justify-center
                    rounded-md
                    text-scholarhub-primary
                    transition
                    hover:bg-scholarhub-border
                "
            >

                <x-lucide-arrow-left class="h-6 w-6" />

            </a>

        @else

            <button
                type="button"
                wire:click="cancelPayment"
                aria-label="Cancel payment"
                class="
                    flex
                    h-12
                    w-12
                    items-center
                    justify-center
                    rounded-md
                    text-scholarhub-primary
                    transition
                    hover:bg-scholarhub-border
                "
            >

                <x-lucide-arrow-left class="h-6 w-6" />

            </button>

        @endif

        <div
            class="
                flex
                min-w-0
                flex-col
                gap-1
            "
        >

            <h1
                class="
                    text-xl
                    font-bold
                    leading-[1.2]
                "
            >

                {{ $step === 'booking' ? 'Book Session' : 'Payment' }}

            </h1>

            @if($step === 'booking')

                <p
                    class="
                        truncate
                        text-base
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-muted-light
                    "
                >

                    {{ $mentor->user->name }}

                </p>

            @endif

        </div>

    </header>

    @if(session()->has('error'))

        <div class="px-8 pt-6">

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

        </div>

    @endif

    <main
        class="
            mx-auto
            flex
            w-full
            max-w-[900px]
            flex-col
            gap-6
            px-8
            pb-[76px]
            pt-8
        "
    >

        @if($step === 'booking')

            {{-- MENTOR SUMMARY --}}

            <section
                class="
                    flex
                    items-center
                    gap-6
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-6
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
                            h-[100px]
                            w-[100px]
                            rounded-lg
                            object-cover
                        "
                    >

                @else

                    <div
                        aria-hidden="true"
                        class="
                            h-[100px]
                            w-[100px]
                            rounded-lg
                            bg-[#d9d9d9]
                        "
                    ></div>

                @endif

                <div
                    class="
                        flex
                        min-w-0
                        flex-1
                        flex-col
                        gap-4
                    "
                >

                    <div
                        class="
                            flex
                            flex-col
                            gap-2
                        "
                    >

                        <h2
                            class="
                                truncate
                                text-[25px]
                                font-bold
                                leading-[1.2]
                            "
                        >

                            {{ $mentor->user->name }}

                        </h2>

                        <p
                            class="
                                truncate
                                text-base
                                font-medium
                                leading-[1.2]
                            "
                        >

                            {{ $mentor->specialization }}

                        </p>

                    </div>

                    <div
                        class="
                            inline-flex
                            w-fit
                            items-center
                            gap-1.5
                            rounded-[26px]
                            bg-scholarhub-rating-bg
                            py-1.5
                            pl-3.5
                            pr-[15px]
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-rating-text
                        "
                    >

                        <x-lucide-star
                            class="
                                h-4
                                w-4
                                fill-scholarhub-rating-icon
                                text-scholarhub-rating-icon
                            "
                        />

                        {{
                            number_format(
                                $mentor->average_rating ?? 0,
                                1
                            )
                        }}

                    </div>

                </div>

            </section>

            {{-- SESSION --}}

            <section
                class="
                    flex
                    flex-col
                    gap-6
                "
            >

                <h2
                    class="
                        text-[25px]
                        font-bold
                        leading-[1.2]
                    "
                >

                    Session

                </h2>

                <div
                    class="
                        flex
                        flex-wrap
                        gap-4
                    "
                >

                    <div
                        class="
                            rounded-lg
                            border
                            border-scholarhub-border-selected
                            bg-scholarhub-chip
                            px-6
                            py-4
                            text-base
                            font-semibold
                            leading-[1.2]
                        "
                    >

                        {{ $dateLabel }}

                    </div>

                    <div
                        class="
                            rounded-lg
                            border
                            border-scholarhub-border-selected
                            bg-scholarhub-chip
                            px-6
                            py-4
                            text-base
                            font-semibold
                            leading-[1.2]
                        "
                    >

                        {{ $timeLabel }}

                    </div>

                </div>

            </section>

            {{-- PRICE --}}

            <section
                class="
                    flex
                    flex-col
                    gap-6
                "
            >

                <h2
                    class="
                        text-[25px]
                        font-bold
                        leading-[1.2]
                    "
                >

                    Price

                </h2>

                <div
                    class="
                        w-fit
                        rounded-lg
                        border
                        border-scholarhub-success-border
                        bg-scholarhub-success-soft
                        px-6
                        py-4
                        text-base
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-success-dark
                    "
                >

                    {{ $priceLabel }}

                </div>

            </section>

            {{-- TOPIC --}}

            <section
                class="
                    flex
                    flex-col
                    gap-6
                "
            >

                <h2
                    class="
                        text-[25px]
                        font-bold
                        leading-[1.2]
                    "
                >

                    Mentorship Topic

                </h2>

                <input
                    type="text"
                    wire:model="topic"
                    class="
                        w-full
                        rounded-lg
                        border
                        border-scholarhub-border-strong
                        bg-white
                        p-4
                        text-base
                        font-medium
                        leading-[1.2]
                        text-scholarhub-primary
                        focus:border-scholarhub-border-selected
                        focus:outline-none
                        focus:ring-0
                    "
                >

                @error('topic')

                    <p class="text-sm font-medium text-red-600">

                        {{ $message }}

                    </p>

                @enderror

                <div
                    class="
                        flex
                        gap-4
                        border-t
                        border-scholarhub-border
                        pt-4
                    "
                >

                    <button
                        type="button"
                        wire:click="cancelBooking"
                        class="
                            flex
                            h-12
                            flex-1
                            items-center
                            justify-center
                            rounded-lg
                            border
                            border-scholarhub-primary
                            px-6
                            py-2.5
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-primary
                        "
                    >

                        Cancel Booking

                    </button>

                    <button
                        type="button"
                        wire:click="createBooking"
                        class="
                            flex
                            h-12
                            flex-1
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-6
                            py-2.5
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                            transition
                            hover:bg-scholarhub-primary-active
                        "
                    >

                        Continue to Payment

                    </button>

                </div>

            </section>

        @elseif($step === 'payment')

            {{-- PAYMENT --}}

            <section
                class="
                    flex
                    flex-col
                    items-center
                    gap-6
                "
            >

                <p
                    class="
                        w-full
                        text-base
                        font-semibold
                        leading-[1.2]
                    "
                >

                    Please scan the QRIS code using your preferred mobile banking or e-wallet app.
                    Once the payment is completed, click "Already Paid" to confirm your transaction.

                </p>

                <img
                    src="{{ asset('images/booking/qrisdummy.png') }}"
                    alt="QRIS payment code"
                    class="
                        h-[400px]
                        w-[400px]
                        object-cover
                    "
                >

                <div
                    class="
                        flex
                        w-full
                        items-center
                        justify-between
                        text-xl
                        leading-[1.2]
                    "
                >

                    <p
                        class="
                            font-semibold
                            text-scholarhub-muted-light
                        "
                    >

                        Total Payment

                    </p>

                    <p
                        class="
                            font-bold
                            text-scholarhub-success
                        "
                    >

                        {{ $priceLabel }}

                    </p>

                </div>

                <div
                    class="
                        flex
                        w-full
                        gap-4
                        border-t
                        border-scholarhub-border
                        pt-4
                    "
                >

                    <button
                        type="button"
                        wire:click="cancelPayment"
                        class="
                            flex
                            h-12
                            flex-1
                            items-center
                            justify-center
                            rounded-lg
                            border
                            border-scholarhub-primary
                            px-6
                            py-2.5
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-primary
                        "
                    >

                        Cancel Payment

                    </button>

                    <button
                        type="button"
                        wire:click="confirmPayment"
                        class="
                            flex
                            h-12
                            flex-1
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-6
                            py-2.5
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                            transition
                            hover:bg-scholarhub-primary-active
                        "
                    >

                        Already Paid

                    </button>

                </div>

            </section>

            @include('livewire.student.booking.partials.session-summary', [
                'availability' => $summaryAvailability,
                'mentor' => $summaryMentor,
                'topic' => $booking?->topic ?? $topic,
            ])

        @else

            {{-- SUCCESS --}}

            <section
                class="
                    flex
                    flex-col
                    gap-6
                    py-4
                "
            >

                <div
                    class="
                        flex
                        items-center
                        gap-4
                    "
                >

                    <div
                        class="
                            rounded-lg
                            bg-scholarhub-success-strong
                            p-2
                            text-white
                        "
                    >

                        <x-lucide-circle-check class="h-9 w-9" />

                    </div>

                    <h2
                        class="
                            text-[31px]
                            font-bold
                            leading-[1.2]
                        "
                    >

                        Payment Successful!

                    </h2>

                </div>

                <p
                    class="
                        text-xl
                        font-semibold
                        leading-[1.2]
                    "
                >

                    Your mentorship session has been successfully booked.
                    <br>
                    Please check your session details and get ready to meet your mentor.

                </p>

            </section>

            @include('livewire.student.booking.partials.session-summary', [
                'availability' => $summaryAvailability,
                'mentor' => $summaryMentor,
                'topic' => $booking?->topic ?? $topic,
            ])

            <div
                class="
                    flex
                    items-center
                    justify-between
                    text-base
                    leading-[1.2]
                "
            >

                <p
                    class="
                        font-semibold
                        text-scholarhub-muted-light
                    "
                >

                    Paid Amount

                </p>

                <p
                    class="
                        font-bold
                        text-scholarhub-success
                    "
                >

                    {{ $priceLabel }}

                </p>

            </div>

            <div
                class="
                    flex
                    gap-4
                    border-t
                    border-scholarhub-border
                    pt-4
                "
            >

                <a
                    href="/mentors/{{ $summaryMentor->id }}"
                    class="
                        flex
                        h-12
                        flex-1
                        items-center
                        justify-center
                        rounded-lg
                        border
                        border-scholarhub-primary
                        px-6
                        py-2.5
                        text-base
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-primary
                    "
                >

                    Back to Mentor Detail

                </a>

                <a
                    href="/student/bookings"
                    class="
                        flex
                        h-12
                        flex-1
                        items-center
                        justify-center
                        rounded-lg
                        bg-scholarhub-primary
                        px-6
                        py-2.5
                        text-base
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-background
                        transition
                        hover:bg-scholarhub-primary-active
                    "
                >

                    View Session Detail

                </a>

            </div>

        @endif

    </main>

</div>
