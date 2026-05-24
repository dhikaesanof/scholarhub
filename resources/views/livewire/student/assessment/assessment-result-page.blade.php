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

            Assessment Result

        </h1>

        <p
            class="
                text-gray-500
                mt-2
            "
        >

            Here is your scholarship readiness result.

        </p>

    </div>

    {{-- RESULT CARD --}}

    <div
        class="
            bg-white
            border
            rounded-3xl
            shadow-sm
            overflow-hidden
        "
    >

        <div
            class="
                p-8
                flex
                flex-col
                lg:flex-row
                gap-8
            "
        >

            {{-- LEFT SIDE --}}

            <div>

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
                            w-52
                            h-52
                            object-cover
                            rounded-3xl
                            border
                        "
                    >

                @else

                    <div
                        class="
                            w-52
                            h-52
                            rounded-3xl
                            border
                            bg-gray-100
                        "
                    ></div>

                @endif

            </div>

            {{-- RIGHT SIDE --}}

            <div class="flex-1">

                {{-- TITLE --}}

                <h2
                    class="
                        text-4xl
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
                        text-xl
                        text-gray-500
                        mt-2
                    "
                >

                    {{
                        $result->scholarship->provider
                    }}

                </p>

                {{-- SCORE SECTION --}}

                <div class="mt-10">

                    <div
                        class="
                            flex
                            items-center
                            justify-between
                            mb-4
                        "
                    >

                        <div>

                            <p
                                class="
                                    text-gray-500
                                "
                            >

                                Readiness Score

                            </p>

                            <h3
                                class="
                                    text-5xl
                                    font-bold
                                    text-blue-600
                                    mt-2
                                "
                            >

                                {{
                                    round(
                                        $result->readiness_percentage
                                    )
                                }}%

                            </h3>

                        </div>

                        {{-- LABEL --}}

                        <div>

                            <span
                                class="
                                    px-5
                                    py-3
                                    rounded-full
                                    text-lg
                                    font-medium

                                    @if(
                                        $result->readiness_percentage >= 80
                                    )

                                        bg-green-100
                                        text-green-700

                                    @elseif(
                                        $result->readiness_percentage >= 50
                                    )

                                        bg-yellow-100
                                        text-yellow-700

                                    @else

                                        bg-red-100
                                        text-red-700

                                    @endif
                                "
                            >

                                {{
                                    $this->getReadinessLabel()
                                }}

                            </span>

                        </div>

                    </div>

                    {{-- PROGRESS BAR --}}

                    <div
                        class="
                            w-full
                            bg-gray-200
                            rounded-full
                            h-5
                            overflow-hidden
                        "
                    >

                        <div

                            class="
                                bg-blue-600
                                h-5
                                rounded-full
                            "

                            style="
                                width:
                                {{
                                    round(
                                        $result->readiness_percentage
                                    )
                                }}%
                            "
                        ></div>

                    </div>

                </div>

                {{-- INFO SECTION --}}

                <div
                    class="
                        grid
                        grid-cols-1
                        md:grid-cols-2
                        gap-5
                        mt-10
                    "
                >

                    <div
                        class="
                            bg-gray-50
                            rounded-2xl
                            p-5
                        "
                    >

                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >

                            Assessment Date

                        </p>

                        <h3
                            class="
                                text-xl
                                font-bold
                                mt-2
                            "
                        >

                            {{
                                $result->created_at
                                    ->format('d M Y')
                            }}

                        </h3>

                    </div>

                    <div
                        class="
                            bg-gray-50
                            rounded-2xl
                            p-5
                        "
                    >

                        <p
                            class="
                                text-sm
                                text-gray-500
                            "
                        >

                            Scholarship Provider

                        </p>

                        <h3
                            class="
                                text-xl
                                font-bold
                                mt-2
                            "
                        >

                            {{
                                $result->scholarship->provider
                            }}

                        </h3>

                    </div>

                </div>

                {{-- BUTTONS --}}

                <div
                    class="
                        flex
                        flex-wrap
                        gap-4
                        mt-10
                    "
                >

                    {{-- RETAKE --}}

                    <a

                        href="
                            /assessment/{{ $result->scholarship->id }}
                        "

                        class="
                            bg-blue-600
                            hover:bg-blue-700
                            text-white
                            px-6
                            py-4
                            rounded-2xl
                            font-medium
                            transition
                        "
                    >

                        Retake Assessment

                    </a>

                    {{-- ROADMAP --}}

                    <a

                        href="
                            /student/roadmaps/{{ $result->id }}
                        "

                        class="
                            bg-slate-800
                            hover:bg-slate-900
                            text-white
                            px-6
                            py-4
                            rounded-2xl
                            font-medium
                            transition
                        "
                    >

                        View Roadmap

                    </a>

                </div>

                    {{-- ANSWER REVIEW --}}

                        <div
                            class="
                                bg-white
                                border
                                rounded-3xl
                                shadow-sm
                                p-8
                                mt-8
                            "
                        >

                            <div class="mb-8">

                                <h2
                                    class="
                                        text-3xl
                                        font-bold
                                        text-gray-900
                                    "
                                >

                                    Your Answers

                                </h2>

                                <p
                                    class="
                                        text-gray-500
                                        mt-2
                                    "
                                >

                                    Review your assessment responses.

                                </p>

                            </div>

                            <div class="space-y-6">

                                @foreach($result->answers as $answer)

                                    <div
                                        class="
                                            border
                                            rounded-2xl
                                            p-6
                                        "
                                    >

                                        {{-- QUESTION --}}

                                        <h3
                                            class="
                                                text-xl
                                                font-bold
                                                text-gray-900
                                            "
                                        >

                                            {{
                                                $answer
                                                    ->question
                                                    ->question
                                            }}

                                        </h3>

                                        {{-- ANSWER --}}

                                        <div class="mt-4">

                                            <p
                                                class="
                                                    text-sm
                                                    text-gray-500
                                                    mb-2
                                                "
                                            >

                                                Your Answer

                                            </p>

                                            <div
                                                class="
                                                    inline-block
                                                    bg-blue-100
                                                    text-blue-700
                                                    px-4
                                                    py-2
                                                    rounded-xl
                                                "
                                            >

                                                {{ $answer->answer }}

                                            </div>

                                        </div>

                                        {{-- SCORE --}}

                                        <div class="mt-4">

                                            <p
                                                class="
                                                    text-sm
                                                    text-gray-500
                                                "
                                            >

                                                Score:
                                                {{ $answer->score }}

                                            </p>

                                        </div>

                                        {{-- ROADMAP HINT --}}

                                        @if(
                                            $answer->option?->roadmap_text
                                        )

                                            <div
                                                class="
                                                    mt-5
                                                    bg-yellow-50
                                                    border
                                                    border-yellow-200
                                                    rounded-2xl
                                                    p-4
                                                "
                                            >

                                                <p
                                                    class="
                                                        text-sm
                                                        text-yellow-700
                                                        font-medium
                                                        mb-2
                                                    "
                                                >

                                                    Recommended Improvement

                                                </p>

                                                <p
                                                    class="
                                                        text-yellow-800
                                                    "
                                                >

                                                    {{
                                                        $answer
                                                            ->option
                                                            ->roadmap_text
                                                    }}

                                                </p>

                                            </div>

                                        @endif

                                    </div>

                                @endforeach

                            </div>

                        </div>

            </div>

        </div>

    </div>

</div>