<div class="p-8">

    {{-- HEADER --}}

    <div
        class="
            flex
            items-start
            gap-4
            mb-10
        "
    >

        <a

            href="/student/roadmaps"

            class="
                text-[#1B2B5B]
                mt-1
            "
        >

            <x-lucide-arrow-left
                class="
                    w-7
                    h-7
                "
            />

        </a>

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    text-[#1B2B5B]
                "
            >

                Your Roadmap

            </h1>

            <p
                class="
                    text-lg
                    text-gray-400
                "
            >

                {{
                    $result
                        ->scholarship
                        ->title
                }}

            </p>

        </div>

    </div>

    <div
        class="
            bg-white
            border
            rounded-2xl
            p-6
            mb-8
        "
    >

        <div
            class="
                flex
                items-center
                gap-6
            "
        >

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
                        rounded-2xl
                        object-cover
                    "
                >

            @else

                <div
                    class="
                        w-24
                        h-24
                        rounded-2xl
                        bg-gray-200
                    "
                ></div>

            @endif

            <div>

                <h2
                    class="
                        text-4xl
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

                <p
                    class="
                        text-xl
                        text-gray-600
                        mt-2
                    "
                >

                    {{
                        $result
                            ->scholarship
                            ->provider
                    }}

                </p>

                <div
                    class="
                        flex
                        gap-2
                        mt-4
                        flex-wrap
                    "
                >

                    <span
                        class="
                            bg-blue-100
                            text-[#1B2B5B]
                            px-4
                            py-2
                            rounded-full
                            text-sm
                            font-medium
                        "
                    >

                        {{
                            $result
                                ->scholarship
                                ->category
                        }}

                    </span>

                    <span
                        class="
                            bg-green-100
                            text-green-700
                            px-4
                            py-2
                            rounded-full
                            text-sm
                            font-medium
                        "
                    >

                        {{
                            $result
                                ->scholarship
                                ->funding_type
                        }}

                    </span>

                    <span
                        class="
                            bg-green-100
                            text-green-700
                            px-4
                            py-2
                            rounded-full
                            text-sm
                            font-medium
                        "
                    >

                        {{
                            str_replace(
                                '_',
                                ' ',
                                $result
                                    ->scholarship
                                    ->status
                            )
                        }}

                    </span>

                </div>

            </div>

        </div>

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
                rounded-2xl
                p-6
                mb-8
            "
        >

            <h2
                class="
                    text-3xl
                    font-bold
                    text-[#1B2B5B]
                "
            >

                Progress

            </h2>

            <p
                class="
                    text-gray-500
                    mt-2
                "
            >

                Keep improving your readiness.

            </p>

            <div
                class="
                    text-5xl
                    font-bold
                    text-[#1B2B5B]
                    mt-6
                "
            >

                {{ $progress }}%

            </div>

            <div
                class="
                    mt-4
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

            <div class="mb-5">

                <h2
                    class="
                        text-4xl
                        font-bold
                        text-[#1B2B5B]
                    "
                >

                    Complete your roadmap

                </h2>

                <p
                    class="
                        text-gray-500
                        mt-2
                    "
                >

                    One step at a time to improve your readiness.

                </p>

            </div>

            @foreach($roadmaps as $roadmap)

                <div
                    class="
                        border
                        rounded-2xl
                        p-5
                        flex
                        items-center
                        gap-4

                        {{
                            $roadmap->is_completed

                            ? 'bg-green-50'

                            : 'bg-white'
                        }}
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
                            shrink-0
                        "
                    >

                    <p
                        class="
                            text-lg
                            text-[#1B2B5B]

                            {{
                                $roadmap->is_completed

                                ? 'line-through opacity-60'

                                : ''
                            }}
                        "
                    >

                        {{ $roadmap->task }}

                    </p>

                </div>

            @endforeach

        </div>

    @endif

</div>