<div
    class="
        grid
        grid-cols-1
        lg:grid-cols-3
        gap-8
    "
>

    {{-- LEFT CONTENT --}}

    <div
        class="
            lg:col-span-2
            space-y-8
        "
    >

        {{-- LATEST ASSESSMENT --}}

        <div
            class="
                bg-white
                rounded-3xl
                p-8
                shadow
            "
        >

            <div
                class="
                    flex
                    justify-between
                    items-start
                    gap-5
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

                        Latest Readiness

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-2
                        "
                    >

                        Your latest scholarship progress.

                    </p>

                </div>

                @if($latestAssessment)

                    <div class="text-right">

                        <h3
                            class="
                                text-5xl
                                font-bold
                                text-blue-600
                            "
                        >

                            {{
                                round(
                                    $latestAssessment
                                        ->readiness_percentage
                                )
                            }}%

                        </h3>

                        <p
                            class="
                                text-gray-500
                                mt-2
                            "
                        >

                            {{
                                $latestAssessment
                                    ->scholarship
                                    ->title
                            }}

                        </p>

                    </div>

                @endif

            </div>

            {{-- ROADMAP PREVIEW --}}

            <div
                class="
                    mt-8
                    space-y-4
                "
            >

                @forelse($latestRoadmaps as $roadmap)

                    <div
                        class="
                            border
                            rounded-2xl
                            p-5
                            flex
                            justify-between
                            items-center
                        "
                    >

                        <div>

                            <p
                                class="
                                    font-semibold
                                    text-gray-900
                                "
                            >

                                {{ $roadmap->task }}

                            </p>

                        </div>

                    </div>

                @empty

                    <div
                        class="
                            bg-green-100
                            text-green-700
                            p-5
                            rounded-2xl
                        "
                    >

                        All roadmap tasks completed 🎉

                    </div>

                @endforelse

            </div>

            {{-- BUTTON --}}

            @if($latestAssessment)

                <a

                    href="/student/roadmaps"

                    class="
                        inline-block
                        mt-6
                        bg-blue-600
                        hover:bg-blue-700
                        text-white
                        px-6
                        py-3
                        rounded-2xl
                        transition
                    "
                >

                    Continue Roadmap

                </a>

            @endif

        </div>

        {{-- RECOMMENDED SCHOLARSHIPS --}}

        <div
            class="
                bg-white
                rounded-3xl
                p-8
                shadow
            "
        >

            <div
                class="
                    flex
                    justify-between
                    items-center
                "
            >

                <h2
                    class="
                        text-3xl
                        font-bold
                    "
                >

                    Recommended Scholarships

                </h2>

                <a

                    href="/student/scholarships"

                    class="
                        text-blue-600
                        font-medium
                    "
                >

                    View All

                </a>

            </div>

            <div
                class="
                    grid
                    md:grid-cols-2
                    gap-5
                    mt-8
                "
            >

                @foreach(
                    $recommendedScholarships
                    as $scholarship
                )

                    <div
                        class="
                            border
                            rounded-2xl
                            p-5
                            hover:shadow-md
                            transition
                        "
                    >

                        <div
                            class="
                                flex
                                justify-between
                                items-start
                                gap-4
                            "
                        >

                            <div>

                                <h3
                                    class="
                                        text-xl
                                        font-bold
                                        text-gray-900
                                    "
                                >

                                    {{ $scholarship->title }}

                                </h3>

                                <p
                                    class="
                                        text-gray-500
                                        mt-2
                                    "
                                >

                                    {{
                                        $scholarship
                                            ->provider
                                    }}

                                </p>

                            </div>

                            <span
                                class="
                                    bg-blue-100
                                    text-blue-700
                                    text-sm
                                    px-3
                                    py-1
                                    rounded-full
                                "
                            >

                                {{
                                    $scholarship
                                        ->education_level
                                }}

                            </span>

                        </div>

                        <a

                            href="
                                /scholarships/{{ $scholarship->id }}
                            "

                            class="
                                inline-block
                                mt-5
                                text-blue-600
                                font-medium
                            "
                        >

                            View Scholarship →

                        </a>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

    {{-- RIGHT SIDEBAR --}}

    <div
        class="
            space-y-6
        "
    >

        {{-- NOTIFICATIONS --}}

        <div
            class="
                bg-white
                rounded-3xl
                shadow
                overflow-hidden
            "
        >

            <div
                class="
                    border-l-4
                    border-yellow-500
                    p-6
                "
            >

                <h2
                    class="
                        text-2xl
                        font-bold
                        text-gray-900
                    "
                >

                    Event

                </h2>

                <p
                    class="
                        text-gray-500
                        mt-2
                    "
                >

                    Important updates and reminders.

                </p>

            </div>

            <div
                class="
                    p-6
                    space-y-5
                "
            >

                @forelse($notifications as $notification)

                    <div
                        class="
                            border
                            rounded-2xl
                            p-5
                        "
                    >

                        <div
                            class="
                                flex
                                items-start
                                gap-4
                            "
                        >

                            <div>

                                @if(
                                    $notification['type']
                                    == 'closing'
                                )

                                    <div
                                        class="
                                            w-3
                                            h-3
                                            rounded-full
                                            bg-red-500
                                            mt-2
                                        "
                                    ></div>

                                @elseif(
                                    $notification['type']
                                    == 'opening'
                                )

                                    <div
                                        class="
                                            w-3
                                            h-3
                                            rounded-full
                                            bg-green-500
                                            mt-2
                                        "
                                    ></div>

                                @else

                                    <div
                                        class="
                                            w-3
                                            h-3
                                            rounded-full
                                            bg-blue-500
                                            mt-2
                                        "
                                    ></div>

                                @endif

                            </div>

                            <div>

                                <h3
                                    class="
                                        font-bold
                                        text-gray-900
                                    "
                                >

                                    {{
                                        $notification['title']
                                    }}

                                </h3>

                                <p
                                    class="
                                        text-sm
                                        text-gray-500
                                        mt-2
                                    "
                                >

                                    {{
                                        $notification['message']
                                    }}

                                </p>

                            </div>

                        </div>

                    </div>

                @empty

                    <div
                        class="
                            bg-gray-50
                            rounded-2xl
                            p-5
                            text-gray-500
                            text-center
                        "
                    >

                        No notifications yet.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>