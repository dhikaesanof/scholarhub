<div class="p-8">

    {{-- HEADER --}}

    <div
        class="
            flex
            items-center
            gap-4
            mb-8
        "
    >

        <a

            href="/scholarships"

            class="
                text-[#1B2B5B]
            "
        >

            <x-lucide-arrow-left
                class="
                    w-7
                    h-7
                "
            />

        </a>

        <h1
            class="
                text-4xl
                font-bold
                text-[#1B2B5B]
            "
        >

            Saved Scholarships

        </h1>

    </div>

    {{-- SEARCH & FILTER --}}

    <div
        class="
            bg-white
            border
            rounded-2xl
            p-4
            shadow-sm
            mb-8
        "
    >

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-3
                gap-4
            "
        >

            <input

                type="text"

                placeholder="Search scholarships"

                class="
                    w-full
                    border
                    rounded-xl
                    p-3
                "
            >

            <select
                class="
                    w-full
                    border
                    rounded-xl
                    p-3
                "
            >

                <option>

                    All Status

                </option>

            </select>

            <select
                class="
                    w-full
                    border
                    rounded-xl
                    p-3
                "
            >

                <option>

                    All Category

                </option>

            </select>

        </div>

    </div>

    {{-- SCHOLARSHIP GRID --}}

    <div
        class="
            grid
            md:grid-cols-2
            xl:grid-cols-3
            gap-6
        "
    >

        @forelse($bookmarks as $bookmark)

            @php

                $scholarship =
                    $bookmark->scholarship;

            @endphp

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

                    {{ $scholarship->title }}

                </h2>

                {{-- PROVIDER --}}

                <p
                    class="
                        text-gray-600
                        mt-2
                    "
                >

                    {{ $scholarship->provider }}

                    •

                    @if(
                        $scholarship->status
                        === 'OPEN'
                    )

                        Open until

                        {{
                            \Carbon\Carbon::parse(
                                $scholarship->deadline
                            )->format('d F Y')
                        }}

                    @elseif(
                        $scholarship->status
                        === 'CLOSED'
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

                    <span
                        class="
                            px-3
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
                                $scholarship->status
                            )
                        }}

                    </span>

                </div>

                {{-- FOOTER --}}

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
                            /scholarships/{{ $scholarship->id }}
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

                        View Detail

                    </a>

                    <button

                        wire:click="
                            removeBookmark(
                                {{ $bookmark->id }}
                            )
                        "

                        wire:confirm="
                            Remove this bookmark?
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

                No bookmarked scholarships yet.

            </div>

        @endforelse

    </div>

</div>