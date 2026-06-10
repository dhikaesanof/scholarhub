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

        <h1
            class="
                text-4xl
                font-bold
                text-[#1B2B5B]
            "
        >

            Scholarship Management

        </h1>

        <a

            href="/admin/scholarships/create"

            class="
                bg-[#1B2B5B]
                hover:bg-[#162449]
                text-white
                px-6
                py-3
                rounded-xl
                font-medium
                transition
            "
        >

            + Add Scholarship

        </a>

    </div>

    {{-- GRID --}}

    <div
        class="
            grid
            md:grid-cols-2
            xl:grid-cols-3
            gap-6
        "
    >

        @foreach($scholarships as $scholarship)

            <div
                class="
                    bg-white
                    border
                    rounded-2xl
                    p-4
                    hover:shadow-lg
                    transition
                "
            >

                {{-- TOP SECTION --}}

                <div
                    class="
                        flex
                        justify-between
                        items-start
                        mb-4
                    "
                >

                    {{-- THUMBNAIL --}}

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
                                w-14
                                h-14
                                rounded-xl
                                object-cover
                            "
                        >

                    @else

                        <div
                            class="
                                w-14
                                h-14
                                rounded-xl
                                bg-gray-200
                            "
                        ></div>

                    @endif

                    {{-- STATUS --}}

                    <span
                        class="
                            px-4
                            py-1
                            rounded-full
                            text-sm
                            font-medium

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

                        {{
                            str_replace(
                                '_',
                                ' ',
                                ucfirst(
                                    strtolower(
                                        $scholarship->status
                                    )
                                )
                            )
                        }}

                    </span>

                </div>

                {{-- TITLE --}}

                <h2
                    class="
                        text-2xl
                        font-bold
                        text-[#1B2B5B]
                    "
                >

                    {{ $scholarship->title }}

                </h2>

                {{-- PROVIDER + DATE --}}

                <p
                    class="
                        text-gray-600
                        mt-2
                    "
                >

                    {{ $scholarship->provider }}

                    •

                    @if(
                        $scholarship->status === 'OPEN'
                    )

                        Open until

                        {{
                            \Carbon\Carbon::parse(
                                $scholarship->deadline
                            )->format('d F Y')
                        }}

                    @elseif(
                        $scholarship->status === 'CLOSED'
                    )

                        Closed at

                        {{
                            \Carbon\Carbon::parse(
                                $scholarship->deadline
                            )->format('d F Y')
                        }}

                    @else

                        Open at

                        {{
                            \Carbon\Carbon::parse(
                                $scholarship->registration_open_date
                            )->format('d F Y')
                        }}

                    @endif

                </p>

                {{-- BADGES --}}

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
                            font-medium
                        "
                    >

                        {{ $scholarship->category }}

                    </span>

                    <span
                        class="
                            bg-green-100
                            text-green-700
                            px-3
                            py-1
                            rounded-full
                            text-sm
                            font-medium
                        "
                    >

                        {{ $scholarship->funding_type }}

                    </span>

                </div>

                {{-- BUTTONS --}}

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
                            /admin/scholarships/{{ $scholarship->id }}/edit
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

                        Edit Detail

                    </a>

                    <a

                        href="
                            /admin/scholarships/{{ $scholarship->id }}/assessments
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

                        Edit Assessment

                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>