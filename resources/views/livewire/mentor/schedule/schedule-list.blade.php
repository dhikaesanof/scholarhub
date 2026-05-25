<div>

    {{-- PAGE TITLE --}}

    <div class="mb-10">

        <h1
            class="
                text-4xl
                font-bold
                text-[#1E3A6D]
            "
        >

            Mentor Schedule

        </h1>

    </div>

    {{-- ALERTS --}}

    @if(session()->has('error'))

        <div
            class="
                bg-red-100
                text-red-700
                px-4
                py-3
                rounded-2xl
                mb-6
            "
        >

            {{ session('error') }}

        </div>

    @endif

    @if(session()->has('success'))

        <div
            class="
                bg-green-100
                text-green-700
                px-4
                py-3
                rounded-2xl
                mb-6
            "
        >

            {{ session('success') }}

        </div>

    @endif

    @if(session()->has('warning'))

        <div
            class="
                bg-yellow-100
                text-yellow-700
                px-4
                py-3
                rounded-2xl
                mb-6
            "
        >

            {{ session('warning') }}

        </div>

    @endif

    {{-- CREATE SCHEDULE --}}

    <div
        class="
            bg-white
            rounded-3xl
            p-8
            border
            mb-10
        "
    >

        <h2
            class="
                text-3xl
                font-bold
                text-[#1E3A6D]
                mb-8
            "
        >

            Create Schedule

        </h2>

        {{-- DATE --}}

        <div class="mb-6">

            <label
                class="
                    block
                    text-lg
                    font-semibold
                    text-[#1E3A6D]
                    mb-3
                "
            >

                Date

            </label>

            <input

                type="date"

                wire:model="date"

                min="{{ now()->toDateString() }}"

                max="{{ now()->addWeeks(2)->toDateString() }}"

                class="
                    w-full
                    border
                    rounded-2xl
                    px-5
                    py-4
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-200
                "
            >

        </div>

        {{-- TIME --}}

        <div
            class="
                grid
                grid-cols-2
                gap-6
                mb-8
            "
        >

            <div>

                <label
                    class="
                        block
                        text-lg
                        font-semibold
                        text-[#1E3A6D]
                        mb-3
                    "
                >

                    Start Time

                </label>

                <input

                    type="time"

                    wire:model="start_time"

                    class="
                        w-full
                        border
                        rounded-2xl
                        px-5
                        py-4
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-200
                    "
                >

            </div>

            <div>

                <label
                    class="
                        block
                        text-lg
                        font-semibold
                        text-[#1E3A6D]
                        mb-3
                    "
                >

                    End Time

                </label>

                <input

                    type="time"

                    wire:model="end_time"

                    class="
                        w-full
                        border
                        rounded-2xl
                        px-5
                        py-4
                        focus:outline-none
                        focus:ring-2
                        focus:ring-blue-200
                    "
                >

            </div>

        </div>

        <button

            wire:click="save"

            class="
                bg-[#1E3A6D]
                hover:bg-[#27457D]
                text-white
                px-6
                py-3
                rounded-2xl
                font-semibold
            "
        >

            {{ $editingId ? 'Update Schedule' : 'Create Schedule' }}

        </button>

    </div>

    {{-- ALL SCHEDULES --}}

    <div class="mb-8">

        <h2
            class="
                text-3xl
                font-bold
                text-[#1E3A6D]
                mb-6
            "
        >

            All Schedules

        </h2>

        {{-- FILTER --}}

        <div
            class="
                bg-white
                rounded-3xl
                border
                p-6
                mb-8
            "
        >

            <label
                class="
                    block
                    text-lg
                    font-semibold
                    text-[#1E3A6D]
                    mb-3
                "
            >

                Filter by Date

            </label>

            <input

                type="date"

                wire:model.live="filterDate"

                class="
                    w-full
                    border
                    rounded-2xl
                    px-5
                    py-4
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-200
                "
            >

        </div>

        {{-- SCHEDULE LIST --}}

        <div class="space-y-6">

            @foreach($availabilities as $availability)

                <div
                    class="
                        bg-white
                        rounded-3xl
                        border
                        p-6
                    "
                >

                    <div
                        class="
                            flex
                            justify-between
                            items-start
                            mb-5
                        "
                    >

                        <div>

                            <h3
                                class="
                                    text-2xl
                                    font-bold
                                    text-[#1E3A6D]
                                "
                            >

                                {{
                                    \Carbon\Carbon::parse(
                                        $availability->date
                                    )->format('d M Y')
                                }}

                            </h3>

                            <p
                                class="
                                    text-lg
                                    text-[#1E3A6D]
                                    mt-2
                                "
                            >

                                {{ $availability->start_time }}
                                -
                                {{ $availability->end_time }}

                            </p>

                        </div>

                        @if($availability->is_booked)

                            <div
                                class="
                                    bg-blue-100
                                    text-blue-700
                                    px-4
                                    py-2
                                    rounded-full
                                    text-sm
                                    font-semibold
                                "
                            >

                                Booked

                            </div>

                        @else

                            <div
                                class="
                                    bg-green-100
                                    text-green-700
                                    px-4
                                    py-2
                                    rounded-full
                                    text-sm
                                    font-semibold
                                "
                            >

                                Available

                            </div>

                        @endif

                    </div>

                    {{-- BOOKING INFO --}}

                    @if(
                        $availability->booking
                        &&
                        $availability->booking->payment_status == 'PAID'
                    )

                        <div
                            class="
                                bg-[#EAF1FB]
                                border
                                rounded-2xl
                                p-5
                                mb-5
                            "
                        >

                            <h4
                                class="
                                    text-2xl
                                    font-bold
                                    text-[#1E3A6D]
                                "
                            >

                                {{
                                    $availability
                                        ->booking
                                        ->student
                                        ->user
                                        ->name
                                }}

                            </h4>

                            <p
                                class="
                                    text-[#1E3A6D]
                                    mt-2
                                "
                            >

                                Topic:
                                {{
                                    $availability
                                        ->booking
                                        ->topic
                                }}

                            </p>

                        </div>

                    @endif

                    {{-- ACTION BUTTONS --}}

                    <div class="flex gap-3">

                        <button

                            wire:click="edit({{ $availability->id }})"

                            class="
                                bg-[#1E3A6D]
                                hover:bg-[#27457D]
                                text-white
                                px-5
                                py-2
                                rounded-xl
                                font-semibold
                            "
                        >

                            Edit Schedule

                        </button>

                        <button

                            wire:click="delete({{ $availability->id }})"

                            class="
                                bg-red-700
                                hover:bg-red-800
                                text-white
                                px-5
                                py-2
                                rounded-xl
                                font-semibold
                            "
                        >

                            Delete Schedule

                        </button>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>