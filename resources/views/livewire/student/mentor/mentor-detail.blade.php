@auth
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
                sticky
                z-20
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
                href="/mentors"
                aria-label="Back to mentors"
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

                    Mentor Detail

                </h1>

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

            </div>

        </header>

        <main
            class="
                mx-auto
                flex
                w-full
                max-w-[1060px]
                flex-col
                gap-8
                px-8
                pb-[76px]
                pt-8
                xl:max-w-[900px]
            "
        >

            {{-- PROFILE --}}

            <section
                class="
                    flex
                    flex-col
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
                                : asset(
                                    'storage/' .
                                    $mentor->user->profile_photo
                                )
                        }}"
                        alt="{{ $mentor->user->name }}"
                        class="
                            h-[120px]
                            w-[120px]
                            rounded-lg
                            object-cover
                        "
                    >

                @else

                    <div
                        aria-hidden="true"
                        class="
                            h-[120px]
                            w-[120px]
                            rounded-lg
                            bg-[#d9d9d9]
                        "
                    ></div>

                @endif

                <div
                    class="
                        flex
                        flex-col
                        gap-2
                    "
                >

                    <h2
                        class="
                            text-[31px]
                            font-bold
                            leading-[1.2]
                        "
                    >

                        {{ $mentor->user->name }}

                    </h2>

                    <p
                        class="
                            text-xl
                            font-medium
                            leading-[1.2]
                        "
                    >

                        {{ $mentor->university }}

                    </p>

                    <p
                        class="
                            text-xl
                            font-medium
                            leading-[1.2]
                        "
                    >

                        {{ $mentor->major }}

                    </p>

                </div>

                <dl
                    class="
                        grid
                        grid-cols-[max-content_minmax(0,1fr)]
                        gap-x-6
                        gap-y-4
                        text-base
                        leading-[1.2]
                    "
                >

                    <dt
                        class="
                            font-semibold
                            text-scholarhub-muted-light
                        "
                    >

                        Rating

                    </dt>

                    <dd>

                        <span
                            class="
                                inline-flex
                                items-center
                                gap-1.5
                                rounded-[26px]
                                bg-scholarhub-rating-bg
                                py-1.5
                                pl-3.5
                                pr-[15px]
                                text-[13px]
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
                                    $mentor->average_rating ?? $reviews->avg('rating') ?? 0,
                                    1
                                )
                            }}

                        </span>

                    </dd>

                    <dt
                        class="
                            font-semibold
                            text-scholarhub-muted-light
                        "
                    >

                        Fee

                    </dt>

                    <dd
                        class="
                            font-semibold
                            text-scholarhub-success
                        "
                    >

                        Rp75.000/session

                    </dd>

                    <dt
                        class="
                            font-semibold
                            text-scholarhub-muted-light
                        "
                    >

                        Focus Areas

                    </dt>

                    <dd class="font-semibold">

                        {{ $mentor->specialization }}

                    </dd>

                    <dt
                        class="
                            font-semibold
                            text-scholarhub-muted-light
                        "
                    >

                        About Mentor

                    </dt>

                    <dd class="font-semibold">

                        {{ $mentor->bio }}

                    </dd>

                </dl>

                <div
                    class="
                        flex
                        flex-wrap
                        gap-4
                        border-t
                        border-scholarhub-border
                        pt-4
                    "
                >

                    @if($mentor->instagram_username)

                        <a
                            href="https://instagram.com/{{ $mentor->instagram_username }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="
                                inline-flex
                                h-9
                                items-center
                                justify-center
                                gap-2.5
                                rounded-[20px]
                                bg-scholarhub-chip
                                px-4
                                py-2.5
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                            "
                        >

                            <x-lucide-instagram class="h-5 w-5" />

                            Instagram

                        </a>

                    @endif

                    <a
                        href="mailto:{{ $mentor->user->email }}"
                        class="
                            inline-flex
                            h-9
                            items-center
                            justify-center
                            gap-2.5
                            rounded-[20px]
                            bg-scholarhub-chip
                            px-4
                            py-2.5
                            text-[13px]
                            font-semibold
                            leading-[1.2]
                        "
                    >

                        <x-lucide-mail class="h-5 w-5" />

                        Email

                    </a>

                </div>

            </section>

            {{-- AVAILABLE SESSIONS --}}

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

                    Available Sessions

                </h2>

                <div
                    class="
                        flex
                        flex-wrap
                        gap-4
                    "
                >

                    @forelse($availableDates as $date)

                        @php
                            $dateSlots = $availabilities->where('date', $date);
                            $dateIsUnavailable = $dateSlots->every(fn ($slot) => $slot->is_booked);
                            $dateIsSelected = $selectedDate == $date;
                        @endphp

                        <button
                            type="button"
                            wire:key="mentor-date-{{ $date }}"
                            wire:click="selectDate('{{ $date }}')"
                            @disabled($dateIsUnavailable)
                            class="
                                rounded-lg
                                px-6
                                py-4
                                text-base
                                font-semibold
                                leading-[1.2]
                                transition

                                @if($dateIsUnavailable)
                                    cursor-not-allowed
                                    bg-scholarhub-border
                                    text-scholarhub-muted-light
                                @elseif($dateIsSelected)
                                    border
                                    border-scholarhub-border-selected
                                    bg-scholarhub-chip
                                    text-scholarhub-primary
                                @else
                                    border
                                    border-scholarhub-border-strong
                                    bg-white
                                    text-scholarhub-primary
                                    hover:border-scholarhub-border-selected
                                @endif
                            "
                        >

                            {{
                                \Carbon\Carbon::parse($date)->format('jS F Y')
                            }}

                        </button>

                    @empty

                        <p
                            class="
                                text-base
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-muted-light
                            "
                        >

                            No available dates yet.

                        </p>

                    @endforelse

                </div>

                <div
                    class="
                        flex
                        flex-wrap
                        gap-4
                    "
                >

                    @forelse($filteredSlots as $slot)

                        @php
                            $slotIsSelected = $selectedSlot == $slot->id;
                        @endphp

                        <button
                            type="button"
                            wire:key="mentor-slot-{{ $slot->id }}"
                            wire:click="selectSlot({{ $slot->id }})"
                            @disabled($slot->is_booked)
                            class="
                                rounded-lg
                                px-6
                                py-4
                                text-base
                                font-semibold
                                leading-[1.2]
                                transition

                                @if($slot->is_booked)
                                    cursor-not-allowed
                                    bg-scholarhub-border
                                    text-scholarhub-muted-light
                                @elseif($slotIsSelected)
                                    border
                                    border-scholarhub-border-selected
                                    bg-scholarhub-chip
                                    text-scholarhub-primary
                                @else
                                    border
                                    border-scholarhub-border-strong
                                    bg-white
                                    text-scholarhub-primary
                                    hover:border-scholarhub-border-selected
                                @endif
                            "
                        >

                            {{
                                \Carbon\Carbon::parse($slot->start_time)->format('g.i')
                            }}-{{
                                \Carbon\Carbon::parse($slot->end_time)->format('g.i A')
                            }}

                        </button>

                    @empty

                        <p
                            class="
                                text-base
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-muted-light
                            "
                        >

                            No available times for this date.

                        </p>

                    @endforelse

                </div>

                <button
                    type="button"
                    wire:click="continueBooking"
                    @disabled(!$selectedSlot)
                    class="
                        flex
                        h-10
                        w-fit
                        min-w-[72px]
                        items-center
                        justify-center
                        rounded-lg
                        bg-scholarhub-primary
                        px-4
                        text-[13px]
                        font-semibold
                        leading-[1.2]
                        text-scholarhub-background
                        transition
                        hover:bg-scholarhub-primary-active
                        disabled:cursor-not-allowed
                        disabled:bg-scholarhub-border
                        disabled:text-scholarhub-muted-light
                    "
                >

                    Book a Session

                </button>

            </section>

            {{-- RECENT REVIEWS --}}

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

                    Recent Review

                </h2>

                <div
                    class="
                        grid
                        grid-cols-1
                        gap-6
                        lg:grid-cols-2
                    "
                >

                    @forelse($reviews->take(2) as $review)

                        <article
                            class="
                                flex
                                h-40
                                flex-col
                                justify-between
                                rounded-lg
                                border
                                border-scholarhub-border
                                bg-white
                                p-6
                            "
                        >

                            <p
                                class="
                                    line-clamp-3
                                    text-base
                                    font-semibold
                                    leading-[1.2]
                                "
                            >

                                "{{ $review->review }}"

                            </p>

                            <div
                                class="
                                    flex
                                    items-center
                                    justify-between
                                    gap-4
                                "
                            >

                                <p
                                    class="
                                        truncate
                                        text-[13px]
                                        font-medium
                                        leading-[1.2]
                                    "
                                >

                                    {{ $review->student->user->name }}

                                </p>

                                <span
                                    class="
                                        inline-flex
                                        items-center
                                        gap-1.5
                                        rounded-[26px]
                                        bg-scholarhub-rating-bg
                                        py-1.5
                                        pl-3.5
                                        pr-[15px]
                                        text-[13px]
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

                                    {{ $review->rating }}

                                </span>

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
                                text-base
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-muted-light
                                lg:col-span-2
                            "
                        >

                            No reviews yet.

                        </div>

                    @endforelse

                </div>

                @if($reviews->count() > 0)

                    <a
                        href="/mentors/{{ $mentor->id }}/reviews"
                        class="
                            flex
                            h-10
                            w-fit
                            min-w-[72px]
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-4
                            text-[13px]
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                            transition
                            hover:bg-scholarhub-primary-active
                        "
                    >

                        See All Reviews

                    </a>

                @endif

            </section>

        </main>

    </div>
@else
    <div
        class="
            min-h-screen
            bg-gray-50
            p-6
            lg:p-10
        "
    >

        <div
            class="
                mx-auto
                max-w-4xl
                rounded-3xl
                border
                bg-white
                p-8
                shadow-sm
            "
        >

            <div
                class="
                    flex
                    flex-col
                    gap-8
                    lg:flex-row
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
                            h-48
                            w-48
                            rounded-3xl
                            border
                            object-cover
                        "
                    >

                @else

                    <div
                        aria-hidden="true"
                        class="
                            h-48
                            w-48
                            rounded-3xl
                            border
                            bg-gray-100
                        "
                    ></div>

                @endif

                <div class="flex-1">

                    <h1
                        class="
                            text-4xl
                            font-bold
                            text-gray-900
                        "
                    >

                        {{ $mentor->user->name }}

                    </h1>

                    <p
                        class="
                            mt-2
                            text-lg
                            text-gray-500
                        "
                    >

                        {{ $mentor->university }}

                    </p>

                    <p
                        class="
                            mt-1
                            text-gray-400
                        "
                    >

                        {{ $mentor->major }}

                    </p>

                    <h2
                        class="
                            mt-8
                            text-lg
                            font-semibold
                            text-gray-900
                        "
                    >

                        Focus Areas

                    </h2>

                    <p
                        class="
                            mt-3
                            text-gray-600
                        "
                    >

                        {{ $mentor->specialization }}

                    </p>

                    <h2
                        class="
                            mt-8
                            text-lg
                            font-semibold
                            text-gray-900
                        "
                    >

                        About Mentor

                    </h2>

                    <p
                        class="
                            mt-3
                            leading-8
                            text-gray-600
                        "
                    >

                        {{ $mentor->bio }}

                    </p>

                    <a
                        href="/login"
                        class="
                            mt-8
                            inline-flex
                            rounded-2xl
                            bg-slate-800
                            px-6
                            py-3
                            font-medium
                            text-white
                            transition
                            hover:bg-slate-900
                        "
                    >

                        Login to Book

                    </a>

                </div>

            </div>

        </div>

    </div>
@endauth
