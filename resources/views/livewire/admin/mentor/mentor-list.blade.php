<div>

    <h1
        class="
            text-3xl
            font-bold
            mb-6
        "
    >

        Mentor Management

    </h1>

    <button

        wire:click="toggleForm"

        class="
            mb-5
            bg-blue-500
            text-white
            px-5
            py-2
            rounded
        "
    >

        {{ $showForm ? 'Close Form' : 'Add Mentor' }}

    </button>

    {{-- FORM --}}

    @if($showForm)

    <div
        class="
            bg-white
            p-6
            rounded-lg
            shadow
            mb-8
        "
    >

        <div class="grid grid-cols-2 gap-4">

            <input
                type="text"
                wire:model="full_name"
                placeholder="Full Name"
                class="border p-2 rounded"
            >

            <input
                type="email"
                wire:model="email"
                placeholder="Email"
                class="border p-2 rounded"
            >

            <input
                type="password"
                wire:model="password"
                placeholder="Password"
                class="border p-2 rounded"
            >

            <input
                type="text"
                wire:model="specialization"
                placeholder="Specialization"
                class="border p-2 rounded"
            >

            <input
                type="text"
                wire:model="university"
                placeholder="University"
                class="border p-2 rounded"
            >

            <input
                type="text"
                wire:model="major"
                placeholder="Major"
                class="border p-2 rounded"
            >

        </div>

        <textarea
            wire:model="bio"
            placeholder="Bio"
            class="
                border
                p-2
                rounded
                w-full
                mt-4
            "
        ></textarea>

        <textarea
            wire:model="achievements"
            placeholder="Achievements"
            class="
                border
                p-2
                rounded
                w-full
                mt-4
            "
        ></textarea>

        <button

            wire:click="save"

            class="
                mt-5
                bg-blue-500
                text-white
                px-5
                py-2
                rounded
            "
        >

            Save Mentor

        </button>

    </div>
    @endif

    {{-- LIST MENTOR --}}

    <div class="space-y-4">

        @foreach($mentors as $mentor)

            <div
                class="
                    bg-white
                    p-5
                    rounded-lg
                    shadow
                "
            >

                <h2
                    class="
                        text-xl
                        font-bold
                    "
                >

                    {{ $mentor->name }}

                </h2>

                <p>

                    {{ $mentor->email }}

                </p>

                <p>

                    {{ $mentor->mentor?->specialization }}

                </p>

                <p>

                    {{ $mentor->mentor?->university }}

                </p>

                <p class="mt-2 text-gray-600">

                    {{ $mentor->mentor?->bio }}

                </p>

                <button

                    wire:click="
                        toggleBlock(
                            {{ $mentor->id }}
                        )
                    "

                    class="
                        mt-3
                        ml-3
                        text-red-500
                    "
                >

                    {{ $mentor->is_blocked
                        ? 'Unblock'
                        : 'Block'
                    }}

                </button>

            </div>

        @endforeach

</div>