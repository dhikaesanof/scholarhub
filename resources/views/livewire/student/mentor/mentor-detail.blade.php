<div class="p-6 lg:p-10 bg-gray-50 min-h-screen">

    {{-- ALERTS --}}

    @if(session()->has('success'))

        <div
            class="
                bg-green-100
                text-green-700
                p-4
                rounded-2xl
                mb-6
            "
        >

            {{ session('success') }}

        </div>

    @endif

    @if(session()->has('error'))

        <div
            class="
                bg-red-100
                text-red-700
                p-4
                rounded-2xl
                mb-6
            "
        >

            {{ session('error') }}

        </div>

    @endif

    {{-- MAIN GRID --}}

    <div
        class="
            grid
            grid-cols-1
            lg:grid-cols-3
            gap-8
            items-start
        "
    >

        {{-- LEFT CONTENT --}}

        <div class="lg:col-span-2 space-y-8">

            {{-- HERO CARD --}}

            <div
                class="
                    bg-white
                    rounded-3xl
                    border
                    shadow-sm
                    overflow-hidden
                "
            >

                <div class="p-8">

                    <div
                        class="
                            flex
                            flex-col
                            lg:flex-row
                            gap-8
                        "
                    >

                        {{-- PHOTO --}}

                        <div class="shrink-0">

                            @if($mentor->user->profile_photo)

                                <img

                                    src="
                                        {{
                                            asset(
                                                'storage/' .
                                                $mentor->user->profile_photo
                                            )
                                        }}
                                    "

                                    class="
                                        w-48
                                        h-48
                                        object-cover
                                        rounded-3xl
                                        border
                                    "
                                >

                            @else

                                <div
                                    class="
                                        w-48
                                        h-48
                                        rounded-3xl
                                        border
                                        bg-gray-100
                                        flex
                                        items-center
                                        justify-center
                                        text-gray-400
                                        text-lg
                                    "
                                >

                                    No Photo

                                </div>

                            @endif

                        </div>

                        {{-- MAIN INFO --}}

                        <div class="flex-1">

                            <div
                                class="
                                    flex
                                    flex-col
                                    lg:flex-row
                                    lg:items-start
                                    justify-between
                                    gap-6
                                "
                            >

                                <div>

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
                                            text-lg
                                            text-gray-500
                                            mt-2
                                        "
                                    >

                                        {{ $mentor->university }}

                                    </p>

                                    <p
                                        class="
                                            text-gray-400
                                            mt-1
                                        "
                                    >

                                        {{ $mentor->major }}

                                    </p>

                                </div>

                                {{-- RATING --}}

                                <div
                                    class="
                                        bg-yellow-100
                                        text-yellow-700
                                        px-5
                                        py-3
                                        rounded-2xl
                                        flex
                                        items-center
                                        gap-3
                                        h-fit
                                    "
                                >

                                    <span class="text-2xl">
                                        ⭐
                                    </span>

                                    <div>

                                        <h3 class="font-bold text-xl">

                                            {{
                                                number_format(
                                                    $mentor->average_rating ?? 0,
                                                    1
                                                )
                                            }}

                                        </h3>

                                        <p class="text-sm">

                                            {{ $reviews->count() }} reviews

                                        </p>

                                    </div>

                                </div>

                            </div>

                            {{-- FOCUS AREA --}}

                            <div class="mt-8">

                                <h2
                                    class="
                                        text-lg
                                        font-semibold
                                        text-gray-900
                                        mb-4
                                    "
                                >

                                    Focus Areas

                                </h2>

                                <div
                                    class="
                                        flex
                                        flex-wrap
                                        gap-3
                                    "
                                >

                                    @foreach(explode(',', $mentor->specialization) as $focus)

                                        <span
                                            class="
                                                px-4
                                                py-2
                                                rounded-full
                                                bg-blue-100
                                                text-blue-700
                                                text-sm
                                                font-medium
                                            "
                                        >

                                            {{ trim($focus) }}

                                        </span>

                                    @endforeach

                                </div>

                            </div>

                            {{-- BIO --}}

                            <div class="mt-8">

                                <h2
                                    class="
                                        text-lg
                                        font-semibold
                                        text-gray-900
                                        mb-4
                                    "
                                >

                                    About Mentor

                                </h2>

                                <p
                                    class="
                                        text-gray-600
                                        leading-8
                                    "
                                >

                                    {{ $mentor->bio }}

                                </p>

                            </div>

                            {{-- SOCIAL LINKS --}}

                            <div
                                class="
                                    flex
                                    flex-wrap
                                    gap-4
                                    mt-8
                                "
                            >

                                @if($mentor->instagram_username)

                                    <a

                                        href="
                                            https://instagram.com/{{ $mentor->instagram_username }}
                                        "

                                        target="_blank"

                                        class="
                                            bg-pink-100
                                            text-pink-700
                                            px-5
                                            py-3
                                            rounded-2xl
                                            text-sm
                                            font-medium
                                        "
                                    >

                                        Instagram

                                    </a>

                                @endif

                                @if($mentor->telegram_link)

                                    <a

                                        href="{{ $mentor->telegram_link }}"

                                        target="_blank"

                                        class="
                                            bg-blue-100
                                            text-blue-700
                                            px-5
                                            py-3
                                            rounded-2xl
                                            text-sm
                                            font-medium
                                        "
                                    >

                                        Telegram

                                    </a>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- REVIEWS --}}

            <div
                class="
                    bg-white
                    rounded-3xl
                    border
                    shadow-sm
                    p-8
                "
            >

                <div
                    class="
                        flex
                        items-center
                        justify-between
                        mb-8
                    "
                >

                    <div>

                        <h2
                            class="
                                text-3xl
                                font-bold
                                text-gray-900
                            "
                        >

                            Student Reviews

                        </h2>

                        <p
                            class="
                                text-gray-500
                                mt-2
                            "
                        >

                            What students say about this mentor.

                        </p>

                    </div>

                </div>

                <div class="space-y-5">

                    @forelse($reviews as $review)

                        <div
                            class="
                                border
                                rounded-2xl
                                p-6
                            "
                        >

                            <div
                                class="
                                    flex
                                    items-center
                                    justify-between
                                    mb-4
                                "
                            >

                                <h3
                                    class="
                                        font-semibold
                                        text-lg
                                    "
                                >

                                    {{ $review->student->user->name }}

                                </h3>

                                <div
                                    class="
                                        text-yellow-500
                                        font-semibold
                                    "
                                >

                                    ⭐ {{ $review->rating }}/5

                                </div>

                            </div>

                            <p
                                class="
                                    text-gray-600
                                    leading-7
                                "
                            >

                                {{ $review->review }}

                            </p>

                        </div>

                    @empty

                        <div
                            class="
                                text-center
                                py-10
                                text-gray-500
                            "
                        >

                            No reviews yet.

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

        {{-- RIGHT SIDEBAR --}}

        <div class="lg:col-span-1">

            <div
                class="
                    bg-white
                    rounded-3xl
                    border
                    shadow-sm
                    p-6
                    sticky
                    top-24
                "
            >

                <div class="mb-8">

                    <h2
                        class="
                            text-2xl
                            font-bold
                            text-gray-900
                        "
                    >

                        Book Mentoring Session

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-2
                        "
                    >

                        Available only for the next 7 days.

                    </p>

                </div>

                    {{-- DATE SELECTOR --}}

                <div
                    class="
                        flex
                        gap-3
                        overflow-x-auto
                        pb-2
                        mb-6
                    "
                >

                    @foreach($availableDates as $date)

                        <button

                            wire:click="
                                selectDate(
                                    '{{ $date }}'
                                )
                            "

                            class="
                                min-w-[100px]
                                px-4
                                py-3
                                rounded-2xl
                                border
                                transition

                                {{
                                    $selectedDate == $date

                                    ? 'bg-blue-600 text-white border-blue-600'

                                    : 'bg-white hover:bg-gray-50'
                                }}
                            "
                        >

                            <div class="font-semibold">

                                {{
                                    \Carbon\Carbon::parse(
                                        $date
                                    )->format('d M')
                                }}

                            </div>

                            <div class="text-sm opacity-80">

                                {{
                                    \Carbon\Carbon::parse(
                                        $date
                                    )->format('D')
                                }}

                            </div>

                        </button>

                    @endforeach

                </div>

                {{-- SLOT LIST --}}

                <div class="grid grid-cols-2 gap-3">

                    @foreach($filteredSlots as $slot)

                        <button

                            wire:click="
                                selectSlot(
                                    {{ $slot->id }}
                                )
                            "

                            @disabled($slot->is_booked)

                            class="
                                py-4
                                rounded-2xl
                                border
                                font-semibold
                                transition

                                @if($slot->is_booked)

                                    bg-gray-200
                                    text-gray-500
                                    cursor-not-allowed

                                @elseif($selectedSlot == $slot->id)

                                    bg-blue-600
                                    text-white
                                    border-blue-600

                                @else

                                    hover:bg-gray-50

                                @endif
                            "
                        >

                            @if($slot->is_booked)

                                Booked

                            @else

                                {{
                                    \Carbon\Carbon::parse(
                                        $slot->start_time
                                    )->format('H:i')
                                }}

                            @endif

                        </button>

                    @endforeach

                </div>

                {{-- CONFIRM BUTTON --}}

                <button

                    wire:click="continueBooking"

                    @disabled(!$selectedSlot)

                    class="
                        w-full
                        mt-6
                        bg-blue-600
                        hover:bg-blue-700
                        disabled:bg-gray-300
                        text-white
                        py-4
                        rounded-2xl
                        font-semibold
                        transition
                    "
                >

                    Continue Booking

                </button>

            </div>

        </div>

    </div>

</div>
```
