<div>

    <h1
        class="
            text-3xl
            font-bold
            mb-6
        "
    >

        Find Mentors

    </h1>

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-2
            gap-6
        "
    >

        @foreach($mentors as $mentor)

            <div
                class="
                    bg-white
                    p-6
                    rounded-lg
                    shadow
                "
            >

                <h2
                    class="
                        text-2xl
                        font-bold
                    "
                >

                    {{ $mentor->user->name }}

                </h2>

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

                <a

                    href="
                        /student/mentors/{{ $mentor->id }}
                    "

                    class="
                        inline-block
                        mt-5
                        bg-blue-500
                        text-white
                        px-5
                        py-2
                        rounded
                    "
                >

                    View Mentor

                </a>

            </div>

        @endforeach

    </div>

</div>