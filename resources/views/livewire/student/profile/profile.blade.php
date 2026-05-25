<div
    class="
        max-w-2xl
        mx-auto
        bg-white
        p-8
        rounded-2xl
        shadow
    "
>

    <h1
        class="
            text-3xl
            font-bold
            mb-8
        "
    >

        Student Profile

    </h1>

    @if(session()->has('success'))

        <div
            class="
                bg-green-100
                text-green-700
                px-4
                py-3
                rounded-lg
                mb-6
            "
        >

            {{ session('success') }}

        </div>

    @endif

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
                mb-6
            "
        >

    @endif

    <div class="space-y-5">

        <div>

            <label class="font-medium">

                Profile Photo

            </label>

            <input
                type="file"
                wire:model="profile_photo"
                class="mt-2"
            >

        </div>

        <div>

            <label class="font-medium">

                Full Name

            </label>

            <input
                type="text"
                wire:model="full_name"
                class="
                    w-full
                    border
                    rounded-lg
                    px-4
                    py-3
                    mt-2
                "
            >

        </div>

        <div>

            <label class="font-medium">

                Email

            </label>

            <input
                type="email"
                wire:model="email"
                class="
                    w-full
                    border
                    rounded-lg
                    px-4
                    py-3
                    mt-2
                "
            >

        </div>

        <div>

            <label class="font-medium">

                University

            </label>

            <input
                type="text"
                wire:model="university"
                class="
                    w-full
                    border
                    rounded-lg
                    px-4
                    py-3
                    mt-2
                "
            >

        </div>

        <div>

            <label class="font-medium">

                Major

            </label>

            <input
                type="text"
                wire:model="major"
                class="
                    w-full
                    border
                    rounded-lg
                    px-4
                    py-3
                    mt-2
                "
            >

        </div>

        <div>

            <label class="font-medium">

                Semester

            </label>

            <input
                type="number"
                wire:model="semester"
                class="
                    w-full
                    border
                    rounded-lg
                    px-4
                    py-3
                    mt-2
                "
            >

        </div>

        <button
            wire:click="updateProfile"
            class="
                bg-blue-600
                text-white
                px-6
                py-3
                rounded-lg
                hover:bg-blue-700
            "
        >

            Save Changes

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

            @error('current_password')

                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>

            @enderror

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

            @error('new_password')

                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>

            @enderror

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

            @error('new_password_confirmation')

                <p class="text-red-500 text-sm mt-1">

                    {{ $message }}

                </p>
            @enderror

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