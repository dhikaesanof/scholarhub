<div class="p-8">

    {{-- HEADER --}}

    <div class="mb-8">

        <h1
            class="
                text-4xl
                font-bold
                text-gray-900
            "
        >

            Assessment History

        </h1>

        <p
            class="
                text-gray-500
                mt-2
            "
        >

            Review your scholarship readiness assessment results.

        </p>

    </div>

    {{-- RESULT GRID --}}

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-2
            gap-6
        "
    >

        @forelse($results as $result)

            <div
                class="
                    bg-white
                    border
                    rounded-3xl
                    shadow-sm
                    overflow-hidden
                    flex
                    flex-col
                    justify-between
                "
            >

                {{-- TOP CONTENT --}}

                <div class="p-6">

                    {{-- SCHOLARSHIP INFO --}}

                    <div
                        class="
                            flex
                            items-center
                            gap-5
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
                                    w-24
                                    h-24
                                    object-cover
                                    rounded-2xl
                                    border
                                "
                            >

                        @else

                            <div
                                class="
                                    w-24
                                    h-24
                                    rounded-2xl
                                    bg-gray-100
                                    border
                                "
                            ></div>

                        @endif

                        {{-- TITLE --}}

                        <div>

                            <h2
                                class="
                                    text-2xl
                                    font-bold
                                    text-gray-900
                                "
                            >

                                {{
                                    $result->scholarship->title
                                }}

                            </h2>

                            <p
                                class="
                                    text-gray-500
                                    mt-1
                                "
                            >

                                {{
                                    $result->scholarship->provider
                                }}

                            </p>

                        </div>

                    </div>

                    {{-- DATE --}}

                    <div class="mt-6">

                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >

                            Assessed on

                        </p>

                        <p
                            class="
                                text-lg
                                font-semibold
                                text-gray-800
                                mt-1
                            "
                        >

                            {{
                                $result->created_at
                                    ->format('d M Y')
                            }}

                        </p>

                    </div>

                </div>

                {{-- BUTTONS --}}

                <div
                    class="
                        border-t
                        p-6
                        flex
                        flex-col
                        gap-3
                    "
                >

                    <a

                        href="
                            /assessment/result/{{ $result->id }}
                        "

                        class="
                            bg-blue-600
                            hover:bg-blue-700
                            text-white
                            text-center
                            py-3
                            rounded-2xl
                            font-medium
                            transition
                        "
                    >

                        View Result

                    </a>

                    <a

                        href="
                            /student/roadmaps/{{ $result->id }}
                        "

                        class="
                            bg-slate-800
                            hover:bg-slate-900
                            text-white
                            text-center
                            py-3
                            rounded-2xl
                            font-medium
                            transition
                        "
                    >

                        View Roadmap

                    </a>

                </div>

            </div>

        @empty

            <div
                class="
                    bg-white
                    border
                    rounded-3xl
                    p-10
                    text-center
                    text-gray-500
                    col-span-full
                "
            >

                No assessment history yet.

            </div>

        @endforelse

    </div>

</div>