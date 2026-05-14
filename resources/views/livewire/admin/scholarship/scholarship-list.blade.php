<div>

    {{ count($scholarships) }}

    <h1>Scholarship List</h1>

    @foreach($scholarships as $scholarship)

        <div style="margin-bottom:20px; border:1px solid black; padding:10px;">

            <h2>{{ $scholarship->title }}</h2>

            <p>{{ $scholarship->provider }}</p>

            <p>{{ $scholarship->status }}</p>

            <p>{{ $scholarship->deadline }}</p>

            <a href="/admin/scholarships/{{ $scholarship->id }}/edit">
                Edit
            </a>

            <button wire:click="delete({{ $scholarship->id }})">
                Delete
            </button>
        </div>

    @endforeach

</div>