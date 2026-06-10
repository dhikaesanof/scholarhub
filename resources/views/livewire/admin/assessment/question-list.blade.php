<div class="min-h-screen bg-[#f5f7fb]">

    {{-- HEADER --}}
    <div class="border-b bg-white px-8 py-5 flex items-center justify-between">

        <div class="flex items-center gap-4">
            <a
                href="#"
                class="text-[#1B3764] hover:opacity-80"
            >
                ←
            </a>

            <div>
                <h1 class="text-3xl font-bold text-[#1B3764]">
                    Assessment Questions
                </h1>

                <p class="text-gray-500 font-medium">
                    for {{ $scholarship->title }}
                </p>
            </div>
        </div>

        <div class="flex items-center gap-3">

            <button
                type="submit"
                form="question-form"
                class="bg-[#1B3764] hover:bg-[#163055] text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition"
            >
                ✓ Save Assessment
            </button>

            <button
                class="border border-[#1B3764] text-[#1B3764] px-6 py-3 rounded-xl font-semibold hover:bg-[#eef3ff] transition"
            >
                ✕ Discard Edit
            </button>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="max-w-5xl mx-auto px-6 py-10">

        {{-- TITLE --}}
        @if($editingQuestionId)

            <h2 class="text-4xl font-bold text-[#1B3764] mb-8">
                Edit Question
            </h2>

        @else

            <h2 class="text-4xl font-bold text-[#1B3764] mb-8">
                Create Question
            </h2>

        @endif

        {{-- FORM --}}
        <form
            wire:submit="save"
            id="question-form"
            class="space-y-8"
        >

            {{-- QUESTION --}}
            <div>

                <label class="block text-2xl font-semibold text-[#1B3764] mb-3">
                    Question
                </label>

                <textarea
                    wire:model="question"
                    class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-[#1B3764]"
                    rows="3"
                ></textarea>

            </div>

            {{-- WEIGHT --}}
            <div class="max-w-md">

                <label class="block text-2xl font-semibold text-[#1B3764] mb-3">
                    Weight
                </label>

                <input
                    type="number"
                    wire:model="weight"
                    class="w-full rounded-2xl border border-gray-200 bg-white px-5 py-4 text-lg focus:outline-none focus:ring-2 focus:ring-[#1B3764]"
                >

            </div>

            {{-- ANSWER OPTIONS --}}
            <div>

                <h3 class="text-3xl font-bold text-[#1B3764] mb-6">
                    Answer Options
                </h3>

                <div class="space-y-4">

                    @foreach($options as $index => $option)

                        <div class="bg-white border border-gray-200 rounded-2xl p-6 flex gap-6 items-start">

                            {{-- OPTION TEXT --}}
                            <div class="flex-1">

                                <label class="text-sm text-gray-400 font-medium">
                                    Option {{ $index + 1 }}
                                </label>

                                <input
                                    type="text"
                                    wire:model="options.{{ $index }}.text"
                                    placeholder="Option Text"
                                    class="w-full mt-1 text-xl font-semibold text-[#1B3764] border-0 focus:ring-0 p-0"
                                >

                            </div>

                            {{-- SCORE --}}
                            <div class="w-40">

                                <label class="text-sm text-gray-400 font-medium">
                                    Option Score
                                </label>

                                <input
                                    type="number"
                                    wire:model="options.{{ $index }}.score"
                                    placeholder="Score"
                                    class="w-full mt-1 text-2xl font-bold text-[#1B3764] border-0 focus:ring-0 p-0"
                                >

                            </div>

                            {{-- ROADMAP --}}
                            <div class="flex-1">

                                <label class="text-sm text-gray-400 font-medium">
                                    Roadmap Suggestion
                                </label>

                                <textarea
                                    wire:model="options.{{ $index }}.roadmap"
                                    placeholder="Roadmap Suggestion"
                                    rows="2"
                                    class="w-full mt-1 text-lg font-semibold text-[#1B3764] border-0 focus:ring-0 p-0 resize-none"
                                ></textarea>

                            </div>

                            {{-- DELETE --}}
                            <div>

                                <button
                                    type="button"
                                    wire:click="removeOption({{ $index }})"
                                    class="border border-red-400 text-red-500 rounded-xl p-3 hover:bg-red-50 transition"
                                >
                                    🗑
                                </button>

                            </div>

                        </div>

                    @endforeach

                </div>

                {{-- ACTION BUTTONS --}}
                <div class="flex items-center gap-4 mt-6">

                    <button
                        type="button"
                        wire:click="addOption"
                        class="border border-[#1B3764] text-[#1B3764] px-6 py-3 rounded-xl font-semibold hover:bg-[#eef3ff] transition"
                    >
                        ＋ Add Option
                    </button>

                    <button
                        type="submit"
                        class="bg-[#1B3764] hover:bg-[#163055] text-white px-6 py-3 rounded-xl font-semibold shadow-sm transition"
                    >
                        ✓ Save Question
                    </button>

                </div>

            </div>

        </form>

        {{-- SAVED QUESTIONS --}}
        <div class="mt-14">

            <h2 class="text-4xl font-bold text-[#1B3764] mb-8">
                Saved Questions
            </h2>

            <div class="space-y-6">

                @foreach($questions as $question)

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">

                        <h3 class="text-3xl font-bold text-[#1B3764] mb-4">
                            {{ $question->question }}
                        </h3>

                        <p class="text-2xl font-semibold text-[#1B3764] mb-6">
                            Weight: {{ $question->weight }}
                        </p>

                        <div class="flex items-center gap-4">

                            <button
                                wire:click="edit({{ $question->id }})"
                                class="bg-[#1B3764] hover:bg-[#163055] text-white px-5 py-3 rounded-xl font-semibold transition"
                            >
                                Edit Question
                            </button>

                            <button
                                wire:click="delete({{ $question->id }})"
                                class="bg-red-700 hover:bg-red-800 text-white px-5 py-3 rounded-xl font-semibold transition"
                            >
                                Delete Question
                            </button>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</div>