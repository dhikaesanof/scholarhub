<div class="p-8">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-8">

        <h1
            class="
                text-4xl
                font-bold
                text-[#1B3764]
            "
        >
            Mentor Management
        </h1>

        <button
            wire:click="toggleForm"
            class="
                bg-[#1B3764]
                hover:bg-[#163055]
                text-white
                px-6
                py-3
                rounded-xl
                font-semibold
                transition
            "
        >
            {{ $showForm ? 'Close Form' : '+ Add Mentor' }}
        </button>

    </div>

    {{-- FORM --}}
    @if($showForm)

        <div
            class="
                bg-white
                rounded-2xl
                border
                border-gray-200
                p-8
                mb-8
                shadow-sm
            "
        >

            <h2
                class="
                    text-2xl
                    font-bold
                    text-[#1B3764]
                    mb-6
                "
            >
                Create Mentor
            </h2>

            <div class="grid md:grid-cols-2 gap-4">

                <input
                    type="text"
                    wire:model="full_name"
                    placeholder="Full Name"
                    class="border border-gray-200 rounded-xl p-3"
                >

                <input
                    type="email"
                    wire:model="email"
                    placeholder="Email"
                    class="border border-gray-200 rounded-xl p-3"
                >

                <input
                    type="password"
                    wire:model="password"
                    placeholder="Password"
                    class="border border-gray-200 rounded-xl p-3"
                >

                <input
                    type="text"
                    wire:model="specialization"
                    placeholder="Specialization"
                    class="border border-gray-200 rounded-xl p-3"
                >

                <input
                    type="text"
                    wire:model="university"
                    placeholder="University"
                    class="border border-gray-200 rounded-xl p-3"
                >

                <input
                    type="text"
                    wire:model="major"
                    placeholder="Major"
                    class="border border-gray-200 rounded-xl p-3"
                >

            </div>

            <textarea
                wire:model="bio"
                placeholder="Bio"
                class="
                    border
                    border-gray-200
                    rounded-xl
                    p-3
                    w-full
                    mt-4
                "
                rows="4"
            ></textarea>

            <textarea
                wire:model="achievements"
                placeholder="Achievements"
                class="
                    border
                    border-gray-200
                    rounded-xl
                    p-3
                    w-full
                    mt-4
                "
                rows="4"
            ></textarea>

            <button
                wire:click="save"
                class="
                    mt-6
                    bg-[#1B3764]
                    hover:bg-[#163055]
                    text-white
                    px-6
                    py-3
                    rounded-xl
                    font-semibold
                "
            >
                Save Mentor
            </button>

        </div>

    @endif

    {{-- MENTOR GRID --}}
    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-2
            xl:grid-cols-3
            gap-6
        "
    >

        @foreach($mentors as $mentor)

            <div
                class="
                    bg-white
                    border
                    border-gray-200
                    rounded-2xl
                    p-5
                    shadow-sm
                "
            >

                {{-- AVATAR --}}
                <img
                            
                    src="

                        {{
                            Str::startsWith(

                                $mentor->profile_photo,

                                'http'
                            )

                            ? $mentor->profile_photo

                            : asset(
                                'storage/' .
                                $mentor->profile_photo
                            )
                        }}

                    "

                    class="
                        w-24
                        h-24
                        object-cover
                        rounded-2xl
                        border
                    "
                >

                {{-- NAME --}}
                <h2
                    class="
                        text-3xl
                        font-bold
                        text-[#1B3764]
                        mb-2
                        mt-8
                    "
                >
                    {{ $mentor->name }}
                </h2>

                {{-- UNIVERSITY --}}
                <p
                    class="
                        text-[#1B3764]
                        text-lg
                        mb-2
                    "
                >
                    {{ $mentor->mentor?->university }}
                    @if($mentor->mentor?->achievements)
                        • {{ $mentor->mentor->achievements }}
                    @endif
                </p>

                {{-- EMAIL --}}
                <p
                    class="
                        text-[#1B3764]
                        mb-5
                    "
                >
                    {{ $mentor->email }}
                </p>

                <hr class="mb-4">

                <div class="space-y-3">

                    <button
                        wire:click="toggleBlock({{ $mentor->id }})"
                        class="
                            w-full
                            border
                            border-red-300
                            text-red-600
                            py-3
                            rounded-xl
                            font-semibold
                            hover:bg-red-50
                            transition
                        "
                    >
                        {{ $mentor->is_blocked ? 'Activate' : 'Deactivate' }}
                    </button>

                </div>

            </div>

        @endforeach

    </div>

</div>