<div class="space-y-8">

    {{-- HEADER --}}

    <div
        class="
            flex
            items-center
            gap-4
        "
    >

        <div class="text-5xl">

            👋

        </div>

        <div>

            <h1
                class="
                    text-4xl
                    font-bold
                    text-[#1B2B5B]
                "
            >

                Hello,
                {{ auth()->user()->name }}!

            </h1>

            <p
                class="
                    text-lg
                    text-gray-500
                "
            >

                Let's continue your scholarship preparation today.

            </p>

        </div>

    </div>

    {{-- TOP SECTION --}}

    <div
        class="
            grid
            lg:grid-cols-3
            gap-6
        "
    >

        {{-- ROADMAP --}}

        <div
            class="
                lg:col-span-2
                bg-white
                rounded-3xl
                p-8
                shadow-sm
            "
        >

            <div
                class="
                    flex
                    justify-between
                    items-start
                "
            >

                <div>

                    <p
                        class="
                            text-gray-500
                        "
                    >

                        Your Roadmap

                    </p>

                    <h2
                        class="
                            text-4xl
                            font-bold
                            text-[#1B2B5B]
                            mt-2
                        "
                    >

                        {{

                            $latestAssessment

                                ? $latestAssessment
                                    ->scholarship
                                    ->title

                                : 'No Assessment Yet'

                        }}

                    </h2>

                </div>

                <div class="text-right">

                    <p
                        class="
                            text-gray-500
                        "
                    >

                        Readiness Score

                    </p>

                    <h2
                        class="
                            text-5xl
                            font-bold
                            text-[#1B2B5B]
                        "
                    >

                        {{

                            $latestAssessment

                                ? round(
                                    $latestAssessment
                                        ->readiness_percentage
                                )

                                : 0

                        }}%

                    </h2>

                </div>

            </div>

            <div
                class="
                    mt-8
                    space-y-4
                "
            >

                @forelse(
                    $latestRoadmaps
                    as $roadmap
                )

                    <div
                        class="
                            bg-[#F8FAFC]
                            border
                            rounded-2xl
                            p-5
                        "
                    >

                        <p
                            class="
                                font-semibold
                                text-[#1B2B5B]
                            "
                        >

                            {{ $roadmap->task }}

                        </p>

                    </div>

                @empty

                    <div
                        class="
                            bg-green-50
                            text-green-700
                            rounded-2xl
                            p-5
                        "
                    >

                        All roadmap tasks completed 🎉

                    </div>

                @endforelse

            </div>

            @if($latestAssessment)

                <a

                    href="/student/roadmaps"

                    class="
                        inline-block
                        mt-8
                        bg-[#1B2B5B]
                        text-white
                        px-6
                        py-3
                        rounded-xl
                        font-medium
                        hover:bg-[#243A79]
                    "
                >

                    Continue Roadmap

                </a>

            @endif

        </div>

        {{-- EVENTS --}}

        <div
            class="
                bg-white
                rounded-3xl
                p-6
                shadow-sm
            "
        >

            <h2
                class="
                    text-2xl
                    font-bold
                    text-[#1B2B5B]
                "
            >

                Upcoming Events

            </h2>

            <div
                class="
                    mt-6
                    space-y-4
                "
            >

                @forelse(
                    $notifications
                    as $notification
                )

                    <div
                        class="
                            bg-[#F8FAFC]
                            border
                            rounded-2xl
                            p-4
                        "
                    >

                        <h3
                            class="
                                font-bold
                                text-[#1B2B5B]
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

                @empty

                    <div
                        class="
                            text-gray-500
                        "
                    >

                        No events available.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

    {{-- SCHOLARSHIP SECTION --}}

    <div
        class="
            bg-white
            rounded-3xl
            p-8
            shadow-sm
        "
    >

        <h2
            class="
                text-4xl
                font-bold
                text-[#1B2B5B]
                mb-8
            "
        >

            Recommended Scholarships

        </h2>

        <div
            class="
                grid
                md:grid-cols-3
                gap-6
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
                        hover:shadow-lg
                        transition
                    "
                >

                    <img

                        src="
                            {{
                                Str::startsWith(
                                    $scholarship->thumbnail,
                                    'http'
                                )

                                ? $scholarship->thumbnail

                                : asset(
                                    'storage/' .
                                    $scholarship->thumbnail
                                )
                            }}
                        "

                        class="
                            w-14
                            h-14
                            rounded-xl
                            object-cover
                            mb-4
                        "
                    >

                    <h3
                        class="
                            text-2xl
                            font-bold
                            text-[#1B2B5B]
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

                        {{ $scholarship->provider }}

                        •

                        Open until

                        {{

                            \Carbon\Carbon::parse(
                                $scholarship->deadline
                            )->format('d F Y')

                        }}

                    </p>

                    <div
                        class="
                            flex
                            flex-wrap
                            gap-2
                            mt-4
                        "
                    >

                        <span
                            class="
                                bg-blue-100
                                text-[#1B2B5B]
                                px-3
                                py-1
                                rounded-full
                                text-sm
                            "
                        >

                            {{
                                $scholarship
                                    ->education_level
                            }}

                        </span>

                        <span
                            class="
                                bg-green-100
                                text-green-700
                                px-3
                                py-1
                                rounded-full
                                text-sm
                            "
                        >

                            Open

                        </span>

                    </div>

                    <div
                        class="
                            border-t
                            mt-5
                            pt-4
                            flex
                            gap-3
                        "
                    >

                        <a

                            href="/scholarships/{{ $scholarship->id }}"

                            class="
                                flex-1
                                text-center
                                bg-[#1B2B5B]
                                text-white
                                py-3
                                rounded-xl
                                font-medium
                            "
                        >

                            View Detail

                        </a>

                        @if(
                            $this->isBookmarked(
                                $scholarship->id
                            )
                        )

                            <button

                                wire:click="
                                    removeBookmark(
                                        {{ $scholarship->id }}
                                    )
                                "

                                class="
                                    flex-1
                                    border
                                    border-[#1B2B5B]
                                    text-[#1B2B5B]
                                    py-3
                                    rounded-xl
                                    font-medium
                                "
                            >

                                Saved ✓

                            </button>

                        @else

                            <button

                                wire:click="
                                    bookmark(
                                        {{ $scholarship->id }}
                                    )
                                "

                                class="
                                    flex-1
                                    border
                                    border-[#1B2B5B]
                                    text-[#1B2B5B]
                                    py-3
                                    rounded-xl
                                    font-medium
                                "
                            >

                                Save

                            </button>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

        <div class="mt-8">

            <a

                href="/scholarships"

                class="
                    inline-block
                    bg-[#1B2B5B]
                    text-white
                    px-6
                    py-3
                    rounded-xl
                    font-medium
                "
            >

                View All Scholarships

            </a>

        </div>

    </div>

</div>