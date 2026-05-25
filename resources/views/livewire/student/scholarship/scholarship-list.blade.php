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

            Scholarships

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Explore available scholarship opportunities.

        </p>

    </div>

    {{-- SEARCH --}}

    <div
        class="
            bg-white
            border
            rounded-2xl
            p-5
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

            {{-- SEARCH INPUT --}}

            <div>

                <input

                    type="text"

                    wire:model.live="search"

                    placeholder="Search scholarship..."

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

            {{-- STATUS FILTER --}}

            <div>

                <select

                    wire:model.live="status"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

                    <option value="">
                        All Status
                    </option>

                    <option value="OPEN">
                        OPEN
                    </option>

                    <option value="CLOSED">
                        CLOSED
                    </option>

                    <option value="COMING_SOON">
                        COMING SOON
                    </option>

                </select>

            </div>

            {{-- CATEGORY FILTER --}}

            <div>

                <select

                    wire:model.live="category"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

                    <option value="">
                        All Category
                    </option>

                    <option value="Academic">
                        Academic
                    </option>

                    <option value="Non Academic">
                        Non Academic
                    </option>

                    <option value="Government">
                        Government
                    </option>

                    <option value="International">
                        International
                    </option>

                </select>

            </div>

        </div>

    </div>

    {{-- SCHOLARSHIP LIST --}}

    <div class="space-y-6">

        @forelse($scholarships as $scholarship)

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

                            {{-- CATEGORY --}}

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

                            {{-- FUNDING --}}

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

                            {{-- STATUS --}}

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

                    {{-- DETAIL BUTTON --}}

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

                        View Detail

                    </a>

                    {{-- BOOKMARK BUTTON --}}

                    @if(
                        $this->isBookmarked(
                            $scholarship->id
                        )
                    )

                        <button

                            wire:click="
                                removeBookmark(
                                    {{ $scholarship->id }}
                                )
                            "

                            class="
                                bg-yellow-400
                                hover:bg-yellow-500
                                text-black
                                px-4
                                py-3
                                rounded-xl
                                transition
                                font-medium
                            "
                        >

                            Bookmarked

                        </button>

                    @else

                        <button

                            wire:click="
                                bookmark(
                                    {{ $scholarship->id }}
                                )
                            "

                            class="
                                bg-gray-100
                                hover:bg-gray-200
                                text-gray-800
                                px-4
                                py-3
                                rounded-xl
                                transition
                                font-medium
                            "
                        >

                            Bookmark

                        </button>

                    @endif

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

                No scholarships found.

            </div>

        @endforelse

    </div>

</div>