<div class="p-8">

    {{-- HEADER --}}

    <div class="mb-10">

        <h1
            class="
                text-4xl
                font-bold
                text-gray-900
            "
        >

            Scholarship Assessment

        </h1>

        <p
            class="
                text-gray-500
                mt-2
            "
        >

            Complete this assessment to measure
            your scholarship readiness and generate
            a personalized roadmap.

        </p>

    </div>

    {{-- SCHOLARSHIP CARD --}}

    <div
        class="
            bg-white
            border
            rounded-3xl
            shadow-sm
            overflow-hidden
            mb-10
        "
    >

        <div
            class="
                p-8
                flex
                flex-col
                lg:flex-row
                gap-8
            "
        >

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
                            w-52
                            h-52
                            object-cover
                            rounded-3xl
                            border
                        "
                    >

                @else

                    <div
                        class="
                            w-52
                            h-52
                            rounded-3xl
                            border
                            bg-gray-100
                        "
                    ></div>

                @endif

            </div>

            {{-- CONTENT --}}

            <div class="flex-1">

                <h2
                    class="
                        text-4xl
                        font-bold
                        text-gray-900
                    "
                >

                    {{ $scholarship->title }}

                </h2>

                <p
                    class="
                        text-xl
                        text-gray-500
                        mt-2
                    "
                >

                    {{ $scholarship->provider }}

                </p>

                <div
                    class="
                        flex
                        flex-wrap
                        gap-3
                        mt-6
                    "
                >

                    <span
                        class="
                            bg-blue-100
                            text-blue-700
                            px-4
                            py-2
                            rounded-full
                            text-sm
                        "
                    >

                        {{ $scholarship->category }}

                    </span>

                    <span
                        class="
                            bg-green-100
                            text-green-700
                            px-4
                            py-2
                            rounded-full
                            text-sm
                        "
                    >

                        {{ $scholarship->funding_type }}

                    </span>

                </div>

                <p
                    class="
                        text-gray-600
                        leading-8
                        mt-8
                    "
                >

                    {{ $scholarship->description }}

                </p>

            </div>

        </div>

    </div>

    {{-- SUCCESS ALERT --}}

    @if(session()->has('success'))

        <div
            class="
                bg-green-100
                text-green-700
                p-5
                rounded-2xl
                mb-8
            "
        >

            {{ session('success') }}

        </div>

    @endif

    {{-- FORM --}}

    <form wire:submit.prevent="submit">

        <div class="space-y-8">

            @foreach($questions as $index => $question)

                <div
                    class="
                        bg-white
                        border
                        rounded-3xl
                        shadow-sm
                        p-8
                    "
                >

                    {{-- QUESTION HEADER --}}

                    <div
                        class="
                            flex
                            items-start
                            gap-5
                        "
                    >

                        {{-- NUMBER --}}

                        <div
                            class="
                                w-12
                                h-12
                                rounded-2xl
                                bg-blue-600
                                text-white
                                flex
                                items-center
                                justify-center
                                font-bold
                                text-lg
                                shrink-0
                            "
                        >

                            {{ $index + 1 }}

                        </div>

                        {{-- QUESTION --}}

                        <div class="flex-1">

                            <h2
                                class="
                                    text-2xl
                                    font-bold
                                    text-gray-900
                                    leading-relaxed
                                "
                            >

                                {{ $question->question }}

                            </h2>

                            <p
                                class="
                                    text-gray-500
                                    mt-2
                                "
                            >

                                Choose the answer that best
                                describes your current condition.

                            </p>

                        </div>

                    </div>

                    {{-- OPTIONS --}}

                    <div
                        class="
                            mt-8
                            space-y-4
                        "
                    >

                        @foreach($question->options as $option)

                            <label
                                class="
                                    flex
                                    items-center
                                    gap-4
                                    border
                                    rounded-2xl
                                    p-5
                                    cursor-pointer
                                    hover:border-blue-400
                                    hover:bg-blue-50
                                    transition
                                "
                            >

                                <input

                                    type="radio"

                                    name="question_{{ $question->id }}"

                                    wire:model="answers.{{ $question->id }}"

                                    value="{{ $option->id }}"

                                    class="
                                        w-5
                                        h-5
                                    "
                                >

                                <span
                                    class="
                                        text-lg
                                        text-gray-800
                                    "
                                >

                                    {{ $option->option_text }}

                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>

            @endforeach

        </div>

        {{-- SUBMIT BUTTON --}}

        <div class="mt-10">

            <button

                type="submit"

                class="
                    w-full
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    text-xl
                    font-semibold
                    py-5
                    rounded-3xl
                    transition
                "
            >

                Submit Assessment

            </button>

        </div>

    </form>

</div>