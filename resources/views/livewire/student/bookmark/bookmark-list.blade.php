<div class="p-8">

    {{-- HEADER --}}

    <div class="mb-8">

        <h1
            class="
                text-3xl
                font-bold
                text-gray-900
            "
        >

            My Bookmarks

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Your saved scholarship opportunities.

        </p>

    </div>

    {{-- LIST --}}

    <div class="space-y-6">

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
                    shadow-sm
                    p-6
                    flex
                    flex-col
                    lg:flex-row
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
                                        asset(
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
                                    border
                                    flex
                                    items-center
                                    justify-center
                                    text-gray-400
                                    text-sm
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
                                flex-wrap
                                gap-3
                                mt-4
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

                            {{
                                \Carbon\Carbon::parse(
                                    $scholarship->deadline
                                )->format('d M Y')
                            }}

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
                        justify-center
                    "
                >

                    <a

                        href="
                            /scholarships/{{ $scholarship->id }}
                        "

                        class="
                            bg-blue-600
                            hover:bg-blue-700
                            text-white
                            text-center
                            px-4
                            py-3
                            rounded-xl
                            transition
                            font-medium
                        "
                    >

                        View Scholarship

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
                            bg-red-500
                            hover:bg-red-600
                            text-white
                            px-4
                            py-3
                            rounded-xl
                            transition
                            font-medium
                        "
                    >

                        Remove Bookmark

                    </button>

                </div>

            </div>

        @empty

            <div
                class="
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