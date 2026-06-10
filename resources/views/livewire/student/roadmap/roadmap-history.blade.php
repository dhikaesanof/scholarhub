<div class="p-8">

    {{-- HEADER --}}

    <div class="mb-10">

        <h1
            class="
                text-4xl
                font-bold
                text-[#1B2B5B]
            "
        >

            All Your Roadmaps

        </h1>

    </div>

    {{-- ROADMAP GRID --}}

    <div
        class="
            grid
            md:grid-cols-2
            xl:grid-cols-3
            gap-6
        "
    >

        @forelse($results as $result)

            <div
                class="
                    bg-white
                    border
                    rounded-2xl
                    p-5
                    hover:shadow-lg
                    transition
                "
            >

                {{-- THUMBNAIL --}}

                @if(
                    $result->scholarship->thumbnail
                )

                    <img

                        src="
                            {{
                                Str::startsWith(
                                    $result->scholarship->thumbnail,
                                    'http'
                                )

                                ? $result->scholarship->thumbnail

                                : asset(
                                    'storage/' .
                                    $result->scholarship->thumbnail
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

                @else

                    <div
                        class="
                            w-14
                            h-14
                            rounded-xl
                            bg-gray-200
                            mb-4
                        "
                    ></div>

                @endif

                {{-- TITLE --}}

                <h2
                    class="
                        text-2xl
                        font-bold
                        text-[#1B2B5B]
                    "
                >

                    {{
                        $result
                            ->scholarship
                            ->title
                    }}

                </h2>

                {{-- PROVIDER --}}

                <p
                    class="
                        text-gray-600
                        mt-1
                    "
                >

                    {{
                        $result
                            ->scholarship
                            ->provider
                    }}

                </p>

                {{-- PROGRESS --}}

                <div class="mt-5">

                    <div
                        class="
                            flex
                            justify-between
                            items-center
                            mb-2
                        "
                    >

                        <span
                            class="
                                font-medium
                                text-[#1B2B5B]
                            "
                        >

                            Progress

                        </span>

                        <span
                            class="
                                font-bold
                                text-[#1B2B5B]
                            "
                        >

                            {{
                                $result->progress
                            }}%

                        </span>

                    </div>

                    <div
                        class="
                            h-3
                            bg-gray-200
                            rounded-full
                            overflow-hidden
                        "
                    >

                        <div

                            class="
                                h-3
                                bg-[#1B2B5B]
                                rounded-full
                            "

                            style="
                                width:
                                {{
                                    $result->progress
                                }}%
                            "
                        ></div>

                    </div>

                </div>

                {{-- FOOTER BUTTONS --}}

                <div
                    class="
                        border-t
                        mt-5
                        pt-4
                        flex
                        gap-2
                    "
                >

                    <a

                        href="
                            /student/roadmaps/{{ $result->id }}
                        "

                        class="
                            flex-1
                            bg-[#1B2B5B]
                            text-white
                            text-center
                            py-3
                            rounded-xl
                            font-medium
                        "
                    >

                        View Roadmap

                    </a>

                    <a

                        href="
                            /assessment/result/{{ $result->id }}
                        "

                        class="
                            flex-1
                            border
                            border-[#1B2B5B]
                            text-[#1B2B5B]
                            text-center
                            py-3
                            rounded-xl
                            font-medium
                        "
                    >

                        Assessment Result

                    </a>

                </div>

            </div>

        @empty

            <div
                class="
                    col-span-full
                    bg-white
                    border
                    rounded-2xl
                    p-10
                    text-center
                    text-gray-500
                "
            >

                No roadmap history yet.

            </div>

        @endforelse

    </div>

</div>