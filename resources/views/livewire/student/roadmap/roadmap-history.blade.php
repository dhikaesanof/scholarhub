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

            My Roadmaps

        </h1>

        <p
            class="
                text-gray-500
                mt-2
            "
        >

            Track your scholarship preparation progress.

        </p>

    </div>

    {{-- ROADMAP LIST --}}

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
                    p-6
                    flex
                    flex-col
                    justify-between
                "
            >

                {{-- TOP CONTENT --}}

                <div>

                    {{-- SCHOLARSHIP INFO --}}

                    <div
                        class="
                            flex
                            items-center
                            gap-4
                            mb-5
                        "
                    >

                        @if(
                            $result->scholarship->thumbnail
                        )

                            <img

                                src="
                                    {{
                                        asset(
                                            'storage/' .
                                            $result->scholarship->thumbnail
                                        )
                                    }}
                                "

                                class="
                                    w-20
                                    h-20
                                    object-cover
                                    rounded-2xl
                                    border
                                "
                            >

                        @else

                            <div
                                class="
                                    w-20
                                    h-20
                                    rounded-2xl
                                    bg-gray-100
                                    border
                                "
                            ></div>

                        @endif

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

                    {{-- PROGRESS SECTION --}}

                    <div class="mt-6">

                        <div
                            class="
                                flex
                                items-center
                                justify-between
                                mb-3
                            "
                        >

                            <p
                                class="
                                    text-gray-600
                                    font-medium
                                "
                            >

                                Roadmap Progress

                            </p>

                            <p
                                class="
                                    text-blue-600
                                    font-bold
                                    text-lg
                                "
                            >

                                {{
                                    $result->progress
                                }}%

                            </p>

                        </div>

                        {{-- BAR --}}

                        <div
                            class="
                                w-full
                                bg-gray-200
                                rounded-full
                                h-4
                                overflow-hidden
                            "
                        >

                            <div

                                class="
                                    bg-blue-600
                                    h-4
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

                    {{-- SCORE --}}

                    <div class="mt-6">

                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >

                            Assessment Score

                        </p>

                        <h3
                            class="
                                text-3xl
                                font-bold
                                text-gray-900
                                mt-1
                            "
                        >

                            {{
                                round(
                                    $result->readiness_percentage
                                )
                            }}%

                        </h3>

                    </div>

                </div>

                {{-- BUTTON --}}

                <div
                    class="
                        mt-8
                        border-t
                        pt-5
                    "
                >

                    <a

                        href="
                            /student/roadmaps/{{ $result->id }}
                        "

                        class="
                            block
                            w-full
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

                No roadmap history yet.

            </div>

        @endforelse

    </div>

</div>