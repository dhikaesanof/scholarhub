<div class="p-8">

    {{-- TOP SECTION --}}

    <div
        class="
            bg-white
            border
            rounded-3xl
            shadow-sm
            overflow-hidden
            mb-8
        "
    >

        {{-- COVER / HEADER --}}

        <div
            class="
                p-8
                flex
                flex-col
                lg:flex-row
                gap-8
            "
        >

            {{-- THUMBNAIL --}}

            <div>

                @if($scholarship->thumbnail)

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
                            flex
                            items-center
                            justify-center
                            text-gray-400
                        "
                    >

                        No Image

                    </div>

                @endif

            </div>

            {{-- MAIN CONTENT --}}

            <div class="flex-1">

                <h1
                    class="
                        text-4xl
                        font-bold
                        text-gray-900
                    "
                >

                    {{ $scholarship->title }}

                </h1>

                <p
                    class="
                        text-xl
                        text-gray-600
                        mt-2
                    "
                >

                    {{ $scholarship->provider }}

                </p>

                {{-- BADGES --}}

                <div
                    class="
                        flex
                        flex-wrap
                        gap-3
                        mt-6
                    "
                >

                    <span
                        class="
                            px-4
                            py-2
                            rounded-full
                            bg-blue-100
                            text-blue-700
                            text-sm
                        "
                    >

                        {{ $scholarship->category }}

                    </span>

                    <span
                        class="
                            px-4
                            py-2
                            rounded-full
                            bg-green-100
                            text-green-700
                            text-sm
                        "
                    >

                        {{ $scholarship->funding_type }}

                    </span>

                    <span
                        class="
                            px-4
                            py-2
                            rounded-full
                            text-sm

                            @if($scholarship->status === 'OPEN')

                                bg-green-100
                                text-green-700

                            @elseif($scholarship->status === 'CLOSED')

                                bg-red-100
                                text-red-700

                            @else

                                bg-yellow-100
                                text-yellow-700

                            @endif
                        "
                    >

                        {{ $scholarship->status }}

                    </span>

                </div>

                {{-- INFO GRID --}}

                <div
                    class="
                        grid
                        grid-cols-1
                        md:grid-cols-2
                        gap-5
                        mt-8
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

                            Minimum GPA

                        </p>

                        <h3
                            class="
                                text-2xl
                                font-bold
                                mt-1
                            "
                        >

                            {{ $scholarship->minimum_gpa }}

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

                            Education Level

                        </p>

                        <h3
                            class="
                                text-2xl
                                font-bold
                                mt-1
                            "
                        >

                            {{ $scholarship->education_level }}

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

                            Deadline

                        </p>

                        <h3
                            class="
                                text-2xl
                                font-bold
                                mt-1
                            "
                        >

                            {{
                                \Carbon\Carbon::parse(
                                    $scholarship->deadline
                                )->format('d M Y')
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

                            Registration Open

                        </p>

                        <h3
                            class="
                                text-2xl
                                font-bold
                                mt-1
                            "
                        >

                            {{
                                \Carbon\Carbon::parse(
                                    $scholarship->registration_open_date
                                )->format('d M Y')
                            }}

                        </h3>

                    </div>

                </div>

                {{-- ACTION BUTTONS --}}

                <div
                    class="
                        flex
                        flex-wrap
                        gap-4
                        mt-8
                    "
                >

                    <a

                        href="
                            /assessment/{{ $scholarship->id }}
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

                        Start Assessment

                    </a>

                    <a

                        href="
                            {{ $scholarship->registration_link }}
                        "

                        target="_blank"

                        class="
                            bg-green-600
                            hover:bg-green-700
                            text-white
                            px-6
                            py-4
                            rounded-2xl
                            font-medium
                            transition
                        "
                    >

                        Official Registration

                    </a>

                </div>

            </div>

        </div>

    </div>

    {{-- CONTENT SECTION --}}

    <div
        class="
            grid
            grid-cols-1
            lg:grid-cols-2
            gap-6
        "
    >

        {{-- DESCRIPTION --}}

        <div
            class="
                bg-white
                border
                rounded-3xl
                p-8
                shadow-sm
            "
        >

            <h2
                class="
                    text-2xl
                    font-bold
                    mb-4
                "
            >

                Description

            </h2>

            <div
                class="
                    text-gray-700
                    leading-8
                "
            >

                {!! nl2br(e($scholarship->description)) !!}

            </div>

        </div>

        {{-- BENEFITS --}}

        <div
            class="
                bg-white
                border
                rounded-3xl
                p-8
                shadow-sm
            "
        >

            <h2
                class="
                    text-2xl
                    font-bold
                    mb-4
                "
            >

                Benefits

            </h2>

            <div
                class="
                    text-gray-700
                    leading-8
                "
            >

                {!! nl2br(e($scholarship->benefits)) !!}

            </div>

        </div>

        {{-- REQUIREMENTS --}}

        <div
            class="
                bg-white
                border
                rounded-3xl
                p-8
                shadow-sm
            "
        >

            <h2
                class="
                    text-2xl
                    font-bold
                    mb-4
                "
            >

                Requirements

            </h2>

            <div
                class="
                    text-gray-700
                    leading-8
                "
            >

                {!! nl2br(e($scholarship->requirements)) !!}

            </div>

        </div>

        {{-- REQUIRED DOCUMENTS --}}

        <div
            class="
                bg-white
                border
                rounded-3xl
                p-8
                shadow-sm
            "
        >

            <h2
                class="
                    text-2xl
                    font-bold
                    mb-4
                "
            >

                Required Documents

            </h2>

            <div
                class="
                    text-gray-700
                    leading-8
                "
            >

                {!! nl2br(e($scholarship->required_documents)) !!}

            </div>

        </div>

    </div>

</div>