<div>

    <h1>

        Assessment Questions -
        {{ $scholarship->title }}

    </h1>

    @if($editingQuestionId)

        <h2>Edit Question</h2>

    @else

        <h2>Create Question</h2>

    @endif

    <form wire:submit="save">

        <div>

            <label>Question</label>

            <textarea wire:model="question"></textarea>

        </div>

        <br>

        <div>

            <label>Weight</label>

            <input type="number" wire:model="weight">

        </div>

        <br>
        <hr>

        <h3>Answer Options</h3>

        @foreach($options as $index => $option)

            <div
                style="
                    margin-bottom:20px;
                    border:1px solid black;
                    padding:10px;
                "
            >

                <input
                    type="text"
                    wire:model="options.{{ $index }}.text"
                    placeholder="Option Text"
                >

                <input
                    type="number"
                    wire:model="options.{{ $index }}.score"
                    placeholder="Score"
                >

                <textarea
                    wire:model="options.{{ $index }}.roadmap"
                    placeholder="Roadmap Suggestion"
                ></textarea>

                <button
                    type="button"
                    wire:click="removeOption({{ $index }})"
                >
                    Remove
                </button>

            </div>

        @endforeach

        <button
            type="button"
            wire:click="addOption"
        >

            Add Option

        </button>

        <button type="submit">
            Save Question
        </button>

    </form>

    <hr>

    @foreach($questions as $question)

        <div style="margin-bottom:20px; border:1px solid black; padding:10px;">

            <p>
                Scholarship:
                {{ $question->scholarship->title }}
            </p>

            <p>
                {{ $question->question }}
            </p>

            <p>
                Weight:
                {{ $question->weight }}
            </p>

            <button wire:click="edit({{ $question->id }})">
                Edit
            </button>

            <button wire:click="delete({{ $question->id }})">
                Delete
            </button>

        </div>

    @endforeach

</div>