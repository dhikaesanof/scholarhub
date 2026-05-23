<div
    class="
        space-y-8
    "
>

    <div>

        <h1
            class="
                text-3xl
                font-bold
            "
        >

            Admin Dashboard

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Monitor ScholarHub system overview.

        </p>

    </div>

    {{-- STATS --}}

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-2
            xl:grid-cols-4
            gap-6
        "
    >

        <div
            class="
                bg-white
                p-6
                rounded-2xl
                shadow-sm
                border
            "
        >

            <p
                class="
                    text-gray-500
                    text-sm
                "
            >

                Total Students

            </p>

            <h2
                class="
                    text-3xl
                    font-bold
                    mt-2
                "
            >

                {{ $totalStudents }}

            </h2>

        </div>

        <div
            class="
                bg-white
                p-6
                rounded-2xl
                shadow-sm
                border
            "
        >

            <p
                class="
                    text-gray-500
                    text-sm
                "
            >

                Total Mentors

            </p>

            <h2
                class="
                    text-3xl
                    font-bold
                    mt-2
                "
            >

                {{ $totalMentors }}

            </h2>

        </div>

        <div
            class="
                bg-white
                p-6
                rounded-2xl
                shadow-sm
                border
            "
        >

            <p
                class="
                    text-gray-500
                    text-sm
                "
            >

                Total Scholarships

            </p>

            <h2
                class="
                    text-3xl
                    font-bold
                    mt-2
                "
            >

                {{ $totalScholarships }}

            </h2>

        </div>

        <div
            class="
                bg-white
                p-6
                rounded-2xl
                shadow-sm
                border
            "
        >

            <p
                class="
                    text-gray-500
                    text-sm
                "
            >

                Total Bookings

            </p>

            <h2
                class="
                    text-3xl
                    font-bold
                    mt-2
                "
            >

                {{ $totalBookings }}

            </h2>

        </div>

    </div>

    {{-- QUICK ACTIONS --}}

    <div
        class="
            bg-white
            p-6
            rounded-2xl
            shadow-sm
            border
        "
    >

        <h2
            class="
                text-xl
                font-semibold
                mb-5
            "
        >

            Quick Actions

        </h2>

        <div
            class="
                flex
                flex-wrap
                gap-4
            "
        >

            <a

                href="/admin/students"

                class="
                    bg-blue-600
                    text-white
                    px-5
                    py-3
                    rounded-xl
                    hover:bg-blue-700
                "
            >

                Manage Students

            </a>

            <a

                href="/admin/scholarships"

                class="
                    bg-green-600
                    text-white
                    px-5
                    py-3
                    rounded-xl
                    hover:bg-green-700
                "
            >

                Manage Scholarships

            </a>

            <a

                href="/admin/mentors"

                class="
                    bg-purple-600
                    text-white
                    px-5
                    py-3
                    rounded-xl
                    hover:bg-purple-700
                "
            >

                Manage Mentors

            </a>

            <a
                href="/admin/mentor-earnings"
                class="
                    bg-purple-600
                    text-white
                    px-5
                    py-3
                    rounded-xl
                    hover:bg-purple-700
                "
            >

                Mentor Earnings

            </a>

        </div>

    </div>

    {{-- RECENT BOOKINGS --}}

    <div
        class="
            bg-white
            p-6
            rounded-2xl
            shadow-sm
            border
        "
    >

        <h2
            class="
                text-xl
                font-semibold
                mb-5
            "
        >

            Recent Bookings

        </h2>

        <div
            class="
                space-y-4
            "
        >

            @forelse($recentBookings as $booking)

                <div
                    class="
                        flex
                        items-center
                        justify-between
                        border-b
                        pb-4
                    "
                >

                    <div>

                        <p
                            class="
                                font-medium
                            "
                        >

                            {{
                                $booking
                                    ->student
                                    ->user
                                    ->name
                            }}

                            booked

                            {{
                                $booking
                                    ->mentor
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

                            {{ $booking->topic }}

                        </p>

                    </div>

                    <span
                        class="
                            text-sm
                            px-3
                            py-1
                            rounded-full

                            {{
                                $booking->payment_status
                                    === 'PAID'

                                ? 'bg-green-100 text-green-700'

                                : 'bg-yellow-100 text-yellow-700'
                            }}
                        "
                    >

                        {{
                            $booking->payment_status
                        }}

                    </span>

                </div>

            @empty

                <p
                    class="
                        text-gray-500
                    "
                >

                    No recent bookings yet.

                </p>

            @endforelse

        </div>

    </div>

</div>