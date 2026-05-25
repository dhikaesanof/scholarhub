<div>

    {{-- HEADER --}}

    <div class="mb-10">

        <h1
            class="
                text-3xl
                font-bold
                text-[#1E3A6D]
            "
        >

            👋 Hello,
            {{ auth()->user()->name }}!

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Ready to guide your next scholarship mentee?

        </p>

    </div>

    {{-- OVERVIEW --}}

    <h2
        class="
            text-3xl
            font-bold
            text-[#1E3A6D]
            mb-6
        "
    >

        Overview

    </h2>

    <div
        class="
            grid
            grid-cols-3
            gap-6
            mb-10
        "
    >

        {{-- SESSIONS --}}

        <div
            class="
                bg-[#E8EDF5]
                rounded-2xl
                p-6
            "
        >

            <p class="text-gray-500">

                Sessions This Week

            </p>

            <h2
                class="
                    text-4xl
                    font-bold
                    text-[#1E3A6D]
                    mt-2
                "
            >

                {{ $sessionsThisWeek }}

            </h2>

        </div>

        {{-- RATING --}}

        <div
            class="
                bg-[#F7E8C8]
                rounded-2xl
                p-6
            "
        >

            <p class="text-gray-500">

                Average Rating

            </p>

            <h2
                class="
                    text-4xl
                    font-bold
                    text-[#A56A00]
                    mt-2
                "
            >

                {{
                    number_format(
                        $averageRating,
                        1
                    )
                }}/5

            </h2>

        </div>

        {{-- EARNINGS --}}

        <div
            class="
                bg-[#DDF2EA]
                rounded-2xl
                p-6
            "
        >

            <p class="text-gray-500">

                Total Earnings

            </p>

            <h2
                class="
                    text-4xl
                    font-bold
                    text-[#0B7A55]
                    mt-2
                "
            >

                Rp{{
                    number_format(
                        $totalEarnings,
                        0,
                        ',',
                        '.'
                    )
                }}

            </h2>

        </div>

    </div>

    {{-- UPCOMING SESSION --}}

    <h2
        class="
            text-3xl
            font-bold
            text-[#1E3A6D]
            mb-6
        "
    >

        Upcoming Session

    </h2>

    <div
        class="
            grid
            grid-cols-2
            gap-6
            mb-10
        "
    >

        @foreach($upcomingSessions as $session)

            <div
                class="
                    bg-white
                    rounded-2xl
                    p-6
                    border
                "
            >

                <h3
                    class="
                        text-2xl
                        font-bold
                        text-[#1E3A6D]
                    "
                >

                    {{
                        $session
                            ->student
                            ->user
                            ->name
                    }}

                </h3>

                <p
                    class="
                        text-gray-500
                        mt-2
                    "
                >

                    {{
                        \Carbon\Carbon::parse(
                            $session
                                ->availability
                                ->date
                        )->format('d M')
                    }}

                    •

                    {{
                        $session
                            ->availability
                            ->start_time
                    }}

                    -

                    {{
                        $session
                            ->availability
                            ->end_time
                    }}

                </p>

                <p
                    class="
                        mt-4
                        text-[#1E3A6D]
                    "
                >

                    {{
                        $session->topic
                    }}

                </p>

            </div>

        @endforeach

    </div>

    {{-- RECENT REVIEWS --}}

    <h2
        class="
            text-3xl
            font-bold
            text-[#1E3A6D]
            mb-6
        "
    >

        Recent Review

    </h2>

    <div
        class="
            grid
            grid-cols-3
            gap-6
        "
    >

        @foreach($recentReviews as $review)

            <div
                class="
                    bg-white
                    rounded-2xl
                    p-6
                    border
                "
            >

                <p
                    class="
                        text-[#1E3A6D]
                        font-medium
                    "
                >

                    "{{ $review->review }}"

                </p>

                <div
                    class="
                        flex
                        justify-between
                        items-center
                        mt-10
                    "
                >

                    <p
                        class="
                            text-sm
                            text-gray-500
                        "
                    >

                        {{
                            $review
                                ->student
                                ->user
                                ->name
                        }}

                    </p>

                    <div
                        class="
                            bg-yellow-100
                            text-yellow-700
                            px-3
                            py-1
                            rounded-full
                            text-sm
                            font-semibold
                        "
                    >

                        ⭐ {{ $review->rating }}

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>