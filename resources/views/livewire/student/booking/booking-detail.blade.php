<div
    class="
        -m-10
        min-h-full
        bg-scholarhub-background
        text-scholarhub-primary
    "
>

    @php
        $availability = $booking->availability;
        $mentor = $booking->mentor;
        $existingReview = $this->existingReview;
        $sessionEnded = $this->sessionEnded;
        $sessionStatus = $sessionEnded
            ? 'Completed'
            : (
                $booking->session_status
                    ? ucfirst(strtolower($booking->session_status))
                    : 'Upcoming'
            );
        $paymentStatus = ucfirst(strtolower($booking->payment_status));
        $mentorRating = $mentor->average_rating ?? 4.8;
    @endphp

    <header
        class="
            flex
            items-center
            gap-4
            border-b-2
            border-scholarhub-border
            bg-scholarhub-background/90
            px-8
            py-5
            backdrop-blur
        "
    >

        <a
            href="/student/bookings"
            aria-label="Back to booking history"
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
                text-xl
                font-bold
                leading-[1.2]
            "
        >

            Session Detail

        </h1>

    </header>

    @if(session()->has('success') || session()->has('error'))

        <div
            class="
                mx-auto
                w-full
                max-w-[860px]
                px-6
                pt-6
                lg:px-0
            "
        >

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
            mx-auto
            flex
            w-full
            max-w-[860px]
            flex-col
            gap-8
            px-6
            py-6
            lg:px-0
        "
    >

        <section
            class="
                flex
                flex-col
                gap-5
            "
        >

            <h2 class="text-[25px] font-bold leading-[1.2]">
                Schedule
            </h2>

            <dl
                class="
                    grid
                    grid-cols-[max-content_minmax(0,1fr)]
                    gap-x-6
                    gap-y-4
                    text-xl
                    font-semibold
                    leading-[1.2]
                "
            >

                <dt class="text-scholarhub-muted">
                    Date
                </dt>

                <dd>
                    @if($availability)
                        {{ \Carbon\Carbon::parse($availability->date)->format('jS F Y') }}
                    @else
                        Schedule unavailable
                    @endif
                </dd>

                <dt class="text-scholarhub-muted">
                    Time
                </dt>

                <dd>
                    @if($availability)
                        {{ \Carbon\Carbon::parse($availability->start_time)->format('g.i') }}-{{ \Carbon\Carbon::parse($availability->end_time)->format('g.i A') }}
                    @else
                        -
                    @endif
                </dd>

                <dt class="text-scholarhub-muted">
                    Status
                </dt>

                <dd
                    class="
                        flex
                        flex-wrap
                        gap-2
                    "
                >

                    <span
                        class="
                            rounded-[26px]
                            bg-scholarhub-active/70
                            px-3
                            py-1
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-primary
                        "
                    >
                        {{ $sessionStatus }}
                    </span>

                    <span
                        class="
                            rounded-[26px]
                            px-3
                            py-1
                            text-base
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

                </dd>

            </dl>

        </section>

        <section
            class="
                flex
                flex-col
                gap-5
            "
        >

            <h2 class="text-[25px] font-bold leading-[1.2]">
                Mentor
            </h2>

            <article
                class="
                    flex
                    flex-col
                    gap-6
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-6
                "
            >

                <div
                    class="
                        flex
                        gap-6
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
                                    : asset('storage/' . $mentor->user->profile_photo)
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
                                shrink-0
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

                        <div class="min-w-0">

                            <h3
                                class="
                                    truncate
                                    text-[25px]
                                    font-bold
                                    leading-[1.2]
                                "
                            >
                                {{ $mentor->user->name }}
                            </h3>

                            <p
                                class="
                                    mt-2
                                    truncate
                                    text-base
                                    font-medium
                                    leading-[1.2]
                                "
                            >
                                {{ $mentor->specialization }}
                            </p>

                        </div>

                        <span
                            class="
                                flex
                                w-fit
                                items-center
                                gap-1.5
                                rounded-[26px]
                                bg-scholarhub-rating-bg
                                px-3.5
                                py-1.5
                                text-base
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-rating-text
                            "
                        >
                            <x-lucide-star class="h-4 w-4 fill-current" />
                            {{ number_format((float) $mentorRating, 1) }}
                        </span>

                    </div>

                </div>

                <a
                    href="/mentors/{{ $mentor->id }}"
                    class="
                        ml-auto
                        flex
                        h-10
                        items-center
                        justify-center
                        rounded-lg
                        border
                        border-scholarhub-primary
                        px-6
                        text-base
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-primary
                        transition
                        hover:bg-scholarhub-active/60
                    "
                >
                    View Mentor Detail
                </a>

            </article>

        </section>

        <section
            class="
                flex
                flex-col
                gap-5
            "
        >

            <h2 class="text-[25px] font-bold leading-[1.2]">
                Topic
            </h2>

            <div
                class="
                    rounded-lg
                    border
                    border-scholarhub-border-strong
                    bg-white
                    p-4
                    text-base
                    font-medium
                    leading-[1.2]
                "
            >
                {{ $booking->topic }}
            </div>

        </section>

        <section
            class="
                grid
                grid-cols-1
                gap-x-12
                gap-y-4
                md:grid-cols-[max-content_minmax(0,1fr)_max-content]
            "
        >

            <h2
                class="
                    text-[25px]
                    font-bold
                    leading-[1.2]
                    md:col-span-3
                "
            >
                Mentoring Link
            </h2>

            <p
                class="
                    text-xl
                    font-semibold
                    leading-[1.2]
                    text-scholarhub-muted
                "
            >
                Google Meet
            </p>

            <p
                class="
                    min-w-0
                    break-all
                    text-xl
                    font-semibold
                    leading-[1.2]
                "
            >
                {{ $mentor->gmeet_link ?: 'Not available' }}
            </p>

            @if($mentor->gmeet_link)

                <a
                    href="{{ $mentor->gmeet_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="
                        flex
                        h-10
                        items-center
                        justify-center
                        gap-2
                        rounded-lg
                        bg-scholarhub-primary
                        px-5
                        text-base
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-background
                    "
                >
                    Open Google Meet
                    <x-lucide-arrow-up-right class="h-5 w-5" />
                </a>

            @endif

            <p
                class="
                    text-xl
                    font-semibold
                    leading-[1.2]
                    text-scholarhub-muted
                "
            >
                Telegram
            </p>

            <p
                class="
                    min-w-0
                    break-all
                    text-xl
                    font-semibold
                    leading-[1.2]
                "
            >
                {{ $mentor->telegram_link ?: 'Not available' }}
            </p>

            @if($mentor->telegram_link)

                <a
                    href="{{ $mentor->telegram_link }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="
                        flex
                        h-10
                        items-center
                        justify-center
                        gap-2
                        rounded-lg
                        bg-scholarhub-primary
                        px-5
                        text-base
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-background
                    "
                >
                    Open Telegram
                    <x-lucide-arrow-up-right class="h-5 w-5" />
                </a>

            @endif

        </section>

        <section
            class="
                flex
                flex-col
                gap-5
            "
        >

            <h2 class="text-[25px] font-bold leading-[1.2]">
                Your Review
            </h2>

            @if($existingReview)

                <article
                    class="
                        flex
                        flex-col
                        gap-4
                        rounded-lg
                        border
                        border-scholarhub-border
                        bg-white
                        p-6
                    "
                >

                    <div class="flex gap-1">
                        @for($star = 1; $star <= 5; $star++)
                            <span class="text-2xl leading-none text-scholarhub-rating-icon">
                                {!! $star <= $existingReview->rating ? '&#9733;' : '&#9734;' !!}
                            </span>
                        @endfor
                    </div>

                    <p
                        class="
                            text-xl
                            font-semibold
                            leading-[1.2]
                        "
                    >
                        {{ $existingReview->review }}
                    </p>

                    @if($existingReview->strengths)

                        <div class="flex flex-wrap gap-2">
                            @foreach($existingReview->strengths as $strength)
                                <span
                                    class="
                                        rounded-[26px]
                                        bg-scholarhub-active/70
                                        px-3
                                        py-1.5
                                        text-[13px]
                                        font-semibold
                                        leading-[1.2]
                                    "
                                >
                                    {{ $strength }}
                                </span>
                            @endforeach
                        </div>

                    @endif

                </article>

            @else

                <p
                    class="
                        text-xl
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-muted
                    "
                >
                    Not Available
                </p>

                @if($this->canReview)

                    <button
                        type="button"
                        wire:click="leaveReview"
                        class="
                            flex
                            h-10
                            w-fit
                            items-center
                            justify-center
                            rounded-lg
                            bg-[#df900a]
                            px-6
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-[#fef5e7]
                        "
                    >
                        Leave a Review
                    </button>

                @endif

            @endif

        </section>

    </main>

    @include(
        'livewire.student.booking.partials.review-modal'
    )

</div>
