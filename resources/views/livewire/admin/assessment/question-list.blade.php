<div>

    <h1>Assessment Questions</h1>

    <form wire:submit="save">

        <div>

            <label>Scholarship</label>

            <select wire:model="scholarship_id">

                <option value="">Select Scholarship</option>

                @foreach($scholarships as $scholarship)

                    <option value="{{ $scholarship->id }}">

                        {{ $scholarship->title }}

                    </option>

                @endforeach

            </select>

        </div>

        <br>

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

            <button wire:click="delete({{ $question->id }})">
                Delete
            </button>

        </div>

    @endforeach

</div>