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