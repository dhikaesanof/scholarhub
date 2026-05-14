<div>

    <h1>
        Assessment:
        {{ $scholarship->title }}
    </h1>

    @if(session()->has('success'))

        <div>

            {{ session('success') }}

        </div>

    @endif

    <form wire:submit="submit">

        @foreach($questions as $question)

            <div
                style="margin-bottom:20px;"
            >

                <p>
                    {{ $question->question }}
                </p>

                <select
                    wire:model="answers.{{ $question->id }}"
                >

                    <option value="">
                        Select Answer
                    </option>

                    @foreach($question->options as $option)

                        <option value="{{ $option->id }}">

                            {{ $option->option_text }}

                        </option>

                    @endforeach

                </select>

            </div>

        @endforeach

        <button type="submit">

            Submit Assessment

        </button>

    </form>

</div>