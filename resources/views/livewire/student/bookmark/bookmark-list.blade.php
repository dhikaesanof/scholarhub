<div>

    <h1
        class="
            text-3xl
            font-bold
            mb-6
        "
    >

        My Bookmarks

    </h1>

    @forelse($bookmarks as $bookmark)

        <div
            class="
                bg-white
                p-5
                rounded-lg
                shadow
                mb-4
            "
        >

            <h2
                class="
                    text-xl
                    font-semibold
                    mb-2
                "
            >

                {{ $bookmark->scholarship->title }}

            </h2>

            <p class="mb-2">

                {{ $bookmark->scholarship->provider }}

            </p>

            <p class="mb-4">

                {{ $bookmark->scholarship->description }}

            </p>

            <a
                href="/scholarships/{{ $bookmark->scholarship->id }}"
                class="text-blue-500"
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
                    mt-3
                    text-red-500
                "
            >

                Remove Bookmark

            </button>

        </div>

    @empty

        <p>

            No bookmarked scholarships yet.

        </p>

    @endforelse

</div>