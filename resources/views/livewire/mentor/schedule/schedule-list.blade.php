<div>
    
    <h1
        class="
            text-3xl
            font-bold
            mb-6
        "
    >

        Mentor Schedules

    </h1>

    @if(session()->has('error'))

        <div
            class="
                bg-red-100
                text-red-700
                p-3
                rounded
                mb-5
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
                p-3
                rounded
                mb-5
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
                p-3
                rounded
                mb-5
            "
        >

            {{ session('warning') }}

        </div>

    @endif

    <div
        class="
            bg-white
            p-6
            rounded-lg
            shadow
            mb-8
            space-y-4
        "
    >

        <div>

            <label class="block mb-1">

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
                    rounded
                    p-2
                "
            >

        </div>

        <div>

            <label class="block mb-1">

                Start Time

            </label>

            <input

                type="time"

                wire:model="start_time"

                class="
                    w-full
                    border
                    rounded
                    p-2
                "
            >

        </div>

        <div>

            <label class="block mb-1">

                End Time

            </label>

            <input

                type="time"

                wire:model="end_time"

                class="
                    w-full
                    border
                    rounded
                    p-2
                "
            >

        </div>

        <button

            wire:click="save"

            class="
                bg-blue-500
                text-white
                px-5
                py-2
                rounded
            "
        >

            {{ $editingId ? 'Update Schedule' : 'Generate Schedule' }}

        </button>

    </div>

    <div
        class="
            bg-white
            p-4
            rounded-lg
            shadow
            mb-5
        "
    >

        <label class="block mb-2">

            Filter by Date

        </label>

        <input

            type="date"

            wire:model.live="filterDate"

            class="
                border
                rounded
                p-2
            "
        >

    </div>

    <div class="space-y-4">

        @foreach($availabilities as $availability)

            <div
                class="
                    bg-white
                    p-5
                    rounded-lg
                    shadow
                    flex
                    justify-between
                    items-center
                "
            >

                <div>

                    <p class="font-semibold">

                        {{ $availability->date }}

                    </p>

                    <p>

                        {{ $availability->start_time }}
                        -
                        {{ $availability->end_time }}

                    </p>

                    @if($availability->is_booked)

                        <span
                            class="
                                inline-block
                                mt-2
                                bg-red-100
                                text-red-700
                                text-sm
                                px-3
                                py-1
                                rounded-full
                            "
                        >

                            Booked

                        </span>

                    @else

                        <span
                            class="
                                inline-block
                                mt-2
                                bg-green-100
                                text-green-700
                                text-sm
                                px-3
                                py-1
                                rounded-full
                            "
                        >

                            Available

                        </span>

                    @endif

                </div>

                {{-- ACTION BUTTONS --}}

                <div class="flex items-center">

                    <button

                        wire:click="
                            edit(
                                {{ $availability->id }}
                            )
                        "

                        class="
                            text-blue-500
                            mr-4
                        "
                    >

                        Edit

                    </button>

                    <button

                        onclick="
                            confirm(
                                'Delete this schedule?'
                            ) || event.stopImmediatePropagation()
                        "

                        wire:click="
                            delete(
                                {{ $availability->id }}
                            )
                        "

                        class="text-red-500"
                    >

                        Delete

                    </button>

                </div>

            </div>

        @endforeach

    </div>

</div>