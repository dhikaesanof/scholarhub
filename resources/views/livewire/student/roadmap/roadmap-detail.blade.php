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

            Scholarship Roadmap

        </h1>

        <p
            class="
                text-gray-500
                mt-2
            "
        >

            Complete your roadmap step by step
            to improve your scholarship readiness.

        </p>

    </div>

    @if(!$result)

        <div
            class="
                bg-white
                border
                rounded-3xl
                p-10
                text-center
                text-gray-500
            "
        >

            No assessment result found.

        </div>

    @else

        {{-- PROGRESS CARD --}}

        <div
            class="
                bg-white
                border
                rounded-3xl
                shadow-sm
                p-8
                mb-8
            "
        >

            <div
                class="
                    flex
                    items-center
                    justify-between
                    mb-4
                "
            >

                <div>

                    <h2
                        class="
                            text-2xl
                            font-bold
                            text-gray-900
                        "
                    >

                        Progress

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-1
                        "
                    >

                        Keep improving your readiness.

                    </p>

                </div>

                <div
                    class="
                        text-4xl
                        font-bold
                        text-blue-600
                    "
                >

                    {{ $progress }}%

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
                        transition-all
                    "

                    style="
                        width:
                        {{ $progress }}%
                    "
                ></div>

            </div>

        </div>

        @if($roadmaps->count() === 0)

            <div
                class="
                    bg-green-100
                    text-green-700
                    p-6
                    rounded-3xl
                    text-center
                    text-xl
                    font-semibold
                "
            >

                🎉 Congratulations!
                You are fully prepared for this scholarship.

            </div>

        @endif

        {{-- ROADMAP LIST --}}

        <div class="space-y-5">

            @foreach($roadmaps as $roadmap)

                <div
                    class="
                        bg-white
                        border
                        rounded-3xl
                        shadow-sm
                        p-6
                        flex
                        items-center
                        justify-between
                        gap-5
                    "
                >

                    {{-- LEFT SIDE --}}

                    <div
                        class="
                            flex
                            items-center
                            gap-5
                        "
                    >

                        <input

                            type="checkbox"

                            wire:click="
                                toggleRoadmap(
                                    {{ $roadmap->id }}
                                )
                            "

                            @checked(
                                $roadmap->is_completed
                            )

                            class="
                                w-6
                                h-6
                                rounded
                            "
                        >

                        <div>

                            <p
                                class="
                                    text-lg
                                    text-gray-800

                                    @if(
                                        $roadmap->is_completed
                                    )

                                        line-through
                                        text-gray-400

                                    @endif
                                "
                            >

                                {{ $roadmap->task }}

                            </p>

                        </div>

                    </div>

                    {{-- STATUS --}}

                    <div>

                        @if(
                            $roadmap->is_completed
                        )

                            <span
                                class="
                                    bg-green-100
                                    text-green-700
                                    px-4
                                    py-2
                                    rounded-full
                                    text-sm
                                "
                            >

                                Completed

                            </span>

                        @else

                            <span
                                class="
                                    bg-yellow-100
                                    text-yellow-700
                                    px-4
                                    py-2
                                    rounded-full
                                    text-sm
                                "
                            >

                                In Progress

                            </span>

                        @endif

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>