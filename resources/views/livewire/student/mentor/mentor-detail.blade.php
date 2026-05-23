<div>

    <div
        class="
            bg-white
            p-6
            rounded-lg
            shadow
            mb-8
        "
    >

        <h1
            class="
                text-3xl
                font-bold
            "
        >

            {{ $mentor->user->name }}

        </h1>

        <div
            class="
                flex
                items-center
                gap-2
                mt-3
            "
        >

            <span
                class="
                    text-yellow-500
                    text-xl
                "
            >

                ⭐

            </span>

            <span
                class="
                    font-semibold
                "
            >

                {{ $mentor->average_rating ?? 0 }}

            </span>

            <span
                class="
                    text-gray-500
                    text-sm
                "
            >

                (
                    {{ $reviews->count() }}
                    reviews
                )

            </span>

        </div>

        <p
            class="
                text-blue-500
                mt-2
            "
        >

            {{ $mentor->specialization }}

        </p>

        <p
            class="
                text-gray-600
                mt-4
            "
        >

            {{ $mentor->bio }}

        </p>

        <div class="mt-5 space-y-2">

            @if($mentor->telegram_link)

                <p>

                    Telegram:
                    {{ $mentor->telegram_link }}

                </p>

            @endif

            @if($mentor->instagram_username)

                <p>

                    Instagram:
                    {{ $mentor->instagram_username }}

                </p>

            @endif

        </div>

    </div>

    <div>

        <h2
            class="
                text-2xl
                font-bold
                mb-5
            "
        >

            Available Slots

        </h2>

        @if(session()->has('success'))

            <div
                class="
                    bg-green-100
                    text-green-700
                    p-3
                    rounded
                    mb-5
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
                    p-3
                    rounded
                    mb-5
                "
            >

                {{ session('error') }}

            </div>

        @endif

        <div class="space-y-4">

            @forelse($availabilities as $slot)

                <div
                    class="
                        bg-white
                        p-5
                        rounded-lg
                        shadow
                        flex
                        justify-between
                        items-center
                    "
                >

                    <div>

                        <p class="font-semibold">

                            {{ $slot->date }}

                        </p>

                        <p>

                            {{ $slot->start_time }}
                            -
                            {{ $slot->end_time }}

                        </p>

                    </div>

                    <a

                        href="
                            /student/bookings/create/{{ $slot->id }}
                        "

                        class="
                            bg-blue-500
                            text-white
                            px-5
                            py-2
                            rounded
                        "
                    >

                        Book Session

                    </a>

                </div>

            @empty

                <div
                    class="
                        bg-white
                        p-5
                        rounded-lg
                        shadow
                    "
                >

                    No available slots yet.

                </div>

            @endforelse

        </div>

        </div>

        <div class="mt-10">

        <h2
            class="
                text-2xl
                font-bold
                mb-5
            "
        >

            Student Reviews

        </h2>

        <div class="space-y-4">

            @forelse($reviews as $review)

                <div
                    class="
                        bg-white
                        p-5
                        rounded-lg
                        shadow
                    "
                >

                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            mb-3
                        "
                    >

                        <div>

                            <p
                                class="
                                    font-semibold
                                "
                            >

                                {{
                                    $review
                                        ->student
                                        ->user
                                        ->name
                                }}

                            </p>

                            <p
                                class="
                                    text-sm
                                    text-gray-500
                                "
                            >

                                {{
                                    $review
                                        ->created_at
                                        ->format('d M Y')
                                }}

                            </p>

                        </div>

                        <div
                            class="
                                text-yellow-500
                                font-bold
                            "
                        >

                            ⭐
                            {{ $review->rating }}

                        </div>

                    </div>

                    @if($review->strengths)

                        <div
                            class="
                                flex
                                flex-wrap
                                gap-2
                                mb-3
                            "
                        >

                            @foreach(
                                $review->strengths
                                as $strength
                            )

                                <span
                                    class="
                                        bg-blue-100
                                        text-blue-700
                                        text-xs
                                        px-3
                                        py-1
                                        rounded-full
                                    "
                                >

                                    {{ $strength }}

                                </span>

                            @endforeach

                        </div>

                    @endif

                    @if($review->review)

                        <p
                            class="
                                text-gray-700
                            "
                        >

                            {{ $review->review }}

                        </p>

                    @endif

                </div>

            @empty

                <div
                    class="
                        bg-gray-100
                        p-5
                        rounded-lg
                    "
                >

                    No reviews yet.

                </div>

            @endforelse

        </div>

    </div>

</div>