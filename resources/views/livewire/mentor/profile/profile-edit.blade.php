<div>

    {{-- TOP BAR --}}

    <div
        class="
            flex
            justify-between
            items-center
            mb-10
        "
    >

        <div
            class="
                flex
                items-center
                gap-4
            "
        >

            <a

                href="{{ route('mentor.profile') }}"

                class="
                    text-[#1E3A6D]
                    text-2xl
                "
            >

                ←

            </a>

            <h1
                class="
                    text-4xl
                    font-bold
                    text-[#1E3A6D]
                "
            >

                Edit Profile

            </h1>

        </div>

        <div class="flex gap-4">

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

                ✔ Save Edit

            </button>

            <a

                href="{{ route('mentor.profile') }}"

                class="
                    border
                    border-[#1E3A6D]
                    text-[#1E3A6D]
                    px-6
                    py-3
                    rounded-2xl
                    font-semibold
                "
            >

                ✖ Discard Edit

            </a>

        </div>

    </div>

    {{-- MAIN CARD --}}

    <div
        class="
            bg-white
            rounded-3xl
            border
            p-10
        "
    >

        {{-- PROFILE PICTURE --}}

        <div class="mb-14">

            <h2
                class="
                    text-3xl
                    font-bold
                    text-[#1E3A6D]
                    mb-8
                "
            >

                Profile Picture

            </h2>

            <div class="flex items-center gap-6">

                {{-- PREVIEW --}}

                <img

                    src="
                        {{

                            $profile_photo

                            ? $profile_photo->temporaryUrl()

                            : (

                                auth()->user()->profile_photo

                                ? (

                                    Str::startsWith(

                                        auth()->user()->profile_photo,

                                        'http'
                                    )

                                    ? auth()->user()->profile_photo

                                    : asset(
                                        'storage/' .
                                        auth()->user()->profile_photo
                                    )

                                )

                                : 'https://placehold.co/200x200?text=Mentor'
                            )
                        }}
                    "

                    class="
                        w-28
                        h-28
                        rounded-2xl
                        object-cover
                    "
                >

                {{-- INPUT --}}

                <div class="flex-1">

                    <label
                        class="
                            block
                            text-xl
                            font-bold
                            text-[#1E3A6D]
                            mb-2
                        "
                    >

                        Upload Picture

                    </label>

                    <p
                        class="
                            text-gray-400
                            mb-4
                        "
                    >

                        (supported file: jpg, png, webp)

                    </p>

                    <input

                        type="file"

                        wire:model="profile_photo"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                        "
                    >

                </div>

            </div>

        </div>

        {{-- PROFILE DETAILS --}}

        <div class="mb-14">

            <h2
                class="
                    text-3xl
                    font-bold
                    text-[#1E3A6D]
                    mb-8
                "
            >

                Profile Details

            </h2>

            <div class="space-y-6">

                {{-- FULL NAME --}}

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

                        Full Name

                    </label>

                    <input

                        type="text"

                        wire:model="name"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                        "
                    >

                </div>

                {{-- UNIVERSITY + MAJOR --}}

                <div
                    class="
                        grid
                        grid-cols-2
                        gap-6
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

                            University

                        </label>

                        <input

                            type="text"

                            wire:model="university"

                            class="
                                w-full
                                border
                                rounded-2xl
                                px-5
                                py-4
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

                            Major

                        </label>

                        <input

                            type="text"

                            wire:model="major"

                            class="
                                w-full
                                border
                                rounded-2xl
                                px-5
                                py-4
                            "
                        >

                    </div>

                </div>

                {{-- ACHIEVEMENTS --}}

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

                        Achievements

                    </label>

                    <input

                        type="text"

                        wire:model="achievements"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                        "
                    >

                </div>

                {{-- BIO --}}

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

                        Biography

                    </label>

                    <textarea

                        wire:model="bio"

                        rows="4"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                        "
                    ></textarea>

                </div>

            </div>

        </div>

        {{-- MENTOR SETTINGS --}}

        <div class="mb-14">

            <h2
                class="
                    text-3xl
                    font-bold
                    text-[#1E3A6D]
                    mb-8
                "
            >

                Mentor Settings

            </h2>

            <div class="space-y-6">

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

                        Specialization

                    </label>

                    <input

                        type="text"

                        wire:model="specialization"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
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

                        Price per Session

                    </label>

                    <input

                        type="text"

                        value="Rp75,000"

                        disabled

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                            bg-gray-100
                        "
                    >

                </div>

            </div>

        </div>

        {{-- CONTACTS --}}

        <div>

            <h2
                class="
                    text-3xl
                    font-bold
                    text-[#1E3A6D]
                    mb-8
                "
            >

                Contacts

            </h2>

            <div
                class="
                    grid
                    grid-cols-2
                    gap-6
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

                        Telegram

                    </label>

                    <input

                        type="text"

                        wire:model="telegram_link"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
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

                        Instagram

                    </label>

                    <input

                        type="text"

                        wire:model="instagram_username"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
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

                        Google Meet

                    </label>

                    <input

                        type="text"

                        wire:model="gmeet_link"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
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

                        Email

                    </label>

                    <input

                        type="text"

                        value="{{ auth()->user()->email }}"

                        disabled

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                            bg-gray-100
                        "
                    >

                </div>

            </div>

        </div>

        {{-- CHANGE PASSWORD --}}

        <div class="mt-14">

            <h2
                class="
                    text-3xl
                    font-bold
                    text-[#1E3A6D]
                    mb-8
                "
            >

                Change Password

            </h2>

            <div class="space-y-6">

                {{-- CURRENT PASSWORD --}}

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

                        Current Password

                    </label>

                    <input

                        type="password"

                        wire:model="current_password"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                        "
                    >

                </div>

                {{-- NEW PASSWORD --}}

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

                        New Password

                    </label>

                    <input

                        type="password"

                        wire:model="new_password"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                        "
                    >

                </div>

                {{-- CONFIRM PASSWORD --}}

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

                        Confirm Password

                    </label>

                    <input

                        type="password"

                        wire:model="new_password_confirmation"

                        class="
                            w-full
                            border
                            rounded-2xl
                            px-5
                            py-4
                        "
                    >

                </div>

                <div class="mt-8">

                    <button

                        wire:click="updatePassword"

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

                        Change Password

                    </button>

                </div>

            </div>

        </div>
    
    </div>

</div>