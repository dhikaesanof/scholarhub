<div class="p-8">

    {{-- HEADER --}}

    <div
        class="
            flex
            items-center
            justify-between
            mb-8
        "
    >

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-900
                "
            >

                Scholarship List

            </h1>

            <p
                class="
                    text-gray-500
                    mt-1
                "
            >

                Total Scholarships:
                {{ count($scholarships) }}

            </p>

        </div>

        <a
            href="/admin/scholarships/create"

            class="
                bg-blue-600
                hover:bg-blue-700
                text-white
                px-5
                py-3
                rounded-xl
                font-medium
                transition
            "
        >

            + Add Scholarship

        </a>

    </div>

    {{-- LIST --}}

    <div class="space-y-6">

        @foreach($scholarships as $scholarship)

            <div
                class="
                    bg-white
                    border
                    rounded-2xl
                    shadow-sm
                    p-6
                    flex
                    justify-between
                    gap-6
                "
            >

                {{-- LEFT SIDE --}}

                <div class="flex gap-5">

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
                                    w-28
                                    h-28
                                    object-cover
                                    rounded-2xl
                                    border
                                "
                            >

                        @else

                            <div
                                class="
                                    w-28
                                    h-28
                                    rounded-2xl
                                    bg-gray-100
                                    flex
                                    items-center
                                    justify-center
                                    text-gray-400
                                    text-sm
                                    border
                                "
                            >

                                No Image

                            </div>

                        @endif

                    </div>

                    {{-- CONTENT --}}

                    <div>

                        <h2
                            class="
                                text-2xl
                                font-bold
                                text-gray-900
                            "
                        >

                            {{ $scholarship->title }}

                        </h2>

                        <p
                            class="
                                text-gray-600
                                mt-1
                            "
                        >

                            {{ $scholarship->provider }}

                        </p>

                        {{-- BADGES --}}

                        <div
                            class="
                                flex
                                gap-3
                                mt-4
                                flex-wrap
                            "
                        >

                            <span
                                class="
                                    px-3
                                    py-1
                                    rounded-full
                                    text-sm
                                    bg-blue-100
                                    text-blue-700
                                "
                            >

                                {{ $scholarship->category }}

                            </span>

                            <span
                                class="
                                    px-3
                                    py-1
                                    rounded-full
                                    text-sm
                                    bg-green-100
                                    text-green-700
                                "
                            >

                                {{ $scholarship->funding_type }}

                            </span>

                            <span
                                class="
                                    px-3
                                    py-1
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

                        {{-- DEADLINE --}}

                        <p
                            class="
                                text-sm
                                text-gray-500
                                mt-4
                            "
                        >

                            Deadline:
                            {{ $scholarship->deadline }}

                        </p>

                    </div>

                </div>

                {{-- ACTIONS --}}

                <div
                    class="
                        flex
                        flex-col
                        gap-3
                        min-w-[180px]
                    "
                >

                    <a

                        href="
                            /admin/scholarships/{{ $scholarship->id }}/edit
                        "

                        class="
                            bg-yellow-500
                            hover:bg-yellow-600
                            text-white
                            text-center
                            px-4
                            py-2
                            rounded-xl
                            transition
                        "
                    >

                        Edit

                    </a>

                    <a

                        href="
                            /admin/scholarships/{{ $scholarship->id }}/assessments
                        "

                        class="
                            bg-blue-600
                            hover:bg-blue-700
                            text-white
                            text-center
                            px-4
                            py-2
                            rounded-xl
                            transition
                        "
                    >

                        Manage Assessment

                    </a>

                    <button

                        wire:click="
                            delete(
                                {{ $scholarship->id }}
                            )
                        "

                        class="
                            bg-red-500
                            hover:bg-red-600
                            text-white
                            px-4
                            py-2
                            rounded-xl
                            transition
                        "
                    >

                        Delete

                    </button>

                </div>

            </div>

        @endforeach

    </div>

</div>