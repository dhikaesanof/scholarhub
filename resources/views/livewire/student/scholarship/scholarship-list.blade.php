<div>

    <h1>Scholarships</h1>

    <div style="margin-bottom:20px;">

        <input
            type="text"
            wire:model.live="search"
            placeholder="Search scholarship..."
        >

    </div>

    <div style="margin-bottom:20px;">

        <select wire:model.live="status">

            <option value="">All Status</option>

            <option value="OPEN">OPEN</option>

            <option value="CLOSED">CLOSED</option>

            <option value="COMING_SOON">COMING SOON</option>

        </select>

        <select wire:model.live="category">

            <option value="">All Category</option>

            <option value="Academic">Academic</option>

            <option value="Non Academic">Non Academic</option>

        </select>

    </div>

    @foreach($scholarships as $scholarship)

        <div style="border:1px solid black; padding:20px; margin-bottom:20px;">

            <h2>{{ $scholarship->title }}</h2>

            <p>{{ $scholarship->provider }}</p>

            <p>{{ $scholarship->category }}</p>

            <p>{{ $scholarship->deadline }}</p>

            <a href="/scholarships/{{ $scholarship->id }}">
                View Detail
            </a>

            @if($this->isBookmarked($scholarship->id))

                <button
                    wire:click="removeBookmark({{ $scholarship->id }})"
                >
                    Bookmarked
                </button>

            @else

                <button
                    wire:click="bookmark({{ $scholarship->id }})"
                >
                    Bookmark
                </button>

            @endif
        </div>

    @endforeach

</div>