<div>

    <h1
        class="
            text-3xl
            font-bold
            mb-6
        "
    >

        Mentor Profile

    </h1>

    @if (session()->has('success'))

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

    <div
        class="
            bg-white
            p-6
            rounded-lg
            shadow
            space-y-5
        "
    >

        @if(auth()->user()->profile_photo)

            <img

                src="{{
                    asset(
                        'storage/' .
                        auth()->user()->profile_photo
                    )
                }}"

                class="
                    w-28
                    h-28
                    rounded-full
                    object-cover
                    mb-4
                "
            >

        @endif

        <input
            type="file"
            wire:model="profile_photo"
        >

        <div>

            <label class="block mb-1">

                Full Name

            </label>

            <input

                type="text"

                wire:model="name"

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

                Email

            </label>

            <input

                type="email"

                wire:model="email"

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

                Specialization

            </label>

            <input

                type="text"

                wire:model="specialization"

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

                Bio

            </label>

            <textarea

                wire:model="bio"

                class="
                    w-full
                    border
                    rounded
                    p-2
                "
                rows="5"
            ></textarea>

        </div>

        <div>

            <label class="block mb-1">

                Telegram Link

            </label>

            <input

                type="text"

                wire:model="telegram_link"

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

                Google Meet Link

            </label>

            <input

                type="text"

                wire:model="gmeet_link"

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

                Instagram Username

            </label>

            <input

                type="text"

                wire:model="instagram_username"

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

            Save Profile

        </button>

    </div>

    <div
        class="
            bg-white
            p-6
            rounded-lg
            shadow
            mt-8
            space-y-5
        "
    >

        <h2
            class="
                text-2xl
                font-bold
            "
        >

            Change Password

        </h2>

        @if(session()->has('password_success'))

            <div
                class="
                    bg-green-100
                    text-green-700
                    p-3
                    rounded
                "
            >

                {{ session('password_success') }}

            </div>

        @endif

        @if(session()->has('password_error'))

            <div
                class="
                    bg-red-100
                    text-red-700
                    p-3
                    rounded
                "
            >

                {{ session('password_error') }}

            </div>

        @endif

        <div>

            <label class="block mb-1">

                Current Password

            </label>

            <input

                type="password"

                wire:model="current_password"

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

                New Password

            </label>

            <input

                type="password"

                wire:model="new_password"

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

                Confirm New Password

            </label>

            <input

                type="password"

                wire:model="new_password_confirmation"

                class="
                    w-full
                    border
                    rounded
                    p-2
                "
            >

        </div>

        <button

            wire:click="updatePassword"

            class="
                bg-red-500
                text-white
                px-5
                py-2
                rounded
            "
        >

            Update Password

        </button>

    </div>

</div>