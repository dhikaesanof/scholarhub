<div
    class="
        -m-10
        min-h-full
        bg-scholarhub-background
        text-scholarhub-primary
    "
>

    @php
        $user = auth()->user();
        $currentPhoto = $profile_photo
            ? $profile_photo->temporaryUrl()
            : (
                $user->profile_photo
                    ? (
                        Str::startsWith(
                            $user->profile_photo,
                            'http'
                        )
                            ? $user->profile_photo
                            : asset('storage/' . $user->profile_photo)
                    )
                    : null
            );
    @endphp

    <header
        class="
            sticky
            z-20
            flex
            h-[90px]
            items-center
            justify-between
            gap-4
            border-b-2
            border-scholarhub-border
            bg-scholarhub-background/90
            px-8
            py-5
            backdrop-blur
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
                href="/student/profile"
                aria-label="Back to profile"
                class="
                    flex
                    h-12
                    w-12
                    items-center
                    justify-center
                    rounded-md
                    transition
                    hover:bg-scholarhub-border
                "
            >
                <x-lucide-arrow-left class="h-6 w-6" />
            </a>

            <h1
                class="
                    text-xl
                    font-bold
                    leading-[1.2]
                "
            >
                Edit Profile
            </h1>
        </div>

        <div
            class="
                flex
                items-center
                gap-4
            "
        >
            <button
                type="button"
                wire:click="saveEdit"
                class="
                    flex
                    h-10
                    items-center
                    justify-center
                    gap-2.5
                    rounded-lg
                    bg-scholarhub-primary
                    py-1.5
                    pl-3
                    pr-4
                    text-[13px]
                    font-semibold
                    leading-[1.2]
                    text-scholarhub-background
                "
            >
                <x-lucide-check class="h-5 w-5" />
                Save Edit
            </button>

            <a
                href="/student/profile"
                class="
                    flex
                    h-10
                    items-center
                    justify-center
                    gap-2.5
                    rounded-lg
                    border
                    border-scholarhub-primary
                    py-1.5
                    pl-3
                    pr-4
                    text-[13px]
                    font-semibold
                    leading-[1.2]
                    text-scholarhub-primary
                "
            >
                <x-lucide-clipboard-x class="h-5 w-5" />
                Discard Edit
            </a>
        </div>
    </header>

    @if(
        session()->has('success') ||
        session()->has('password_success') ||
        session()->has('password_error')
    )
        <div
            class="
                mx-auto
                w-full
                max-w-[860px]
                px-6
                pt-6
                lg:px-0
            "
        >
            @if(session()->has('success'))
                <div class="mb-3 rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if(session()->has('password_success'))
                <div class="mb-3 rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-700">
                    {{ session('password_success') }}
                </div>
            @endif

            @if(session()->has('password_error'))
                <div class="mb-3 rounded-lg border border-red-200 bg-red-50 p-4 text-sm font-medium text-red-700">
                    {{ session('password_error') }}
                </div>
            @endif
        </div>
    @endif

    <main
        class="
            mx-auto
            flex
            w-full
            max-w-[860px]
            flex-col
            gap-8
            px-6
            py-6
            lg:px-0
        "
    >

        <section
            class="
                flex
                flex-col
                gap-6
            "
        >
            <h2 class="text-[25px] font-bold leading-[1.2]">
                Profile Picture
            </h2>

            @if($currentPhoto)
                <img
                    src="{{ $currentPhoto }}"
                    alt="{{ $full_name }}"
                    class="
                        h-20
                        w-20
                        rounded-lg
                        object-cover
                    "
                >
            @else
                <div
                    aria-hidden="true"
                    class="
                        h-20
                        w-20
                        rounded-lg
                        bg-[#d9d9d9]
                    "
                ></div>
            @endif

            <div
                class="
                    flex
                    flex-col
                    gap-4
                "
            >
                <div>
                    <h3 class="text-xl font-semibold leading-[1.2]">
                        Upload Picture
                    </h3>
                    <p class="mt-1 text-base font-medium leading-[1.2] text-scholarhub-muted-light">
                        (supported file: .jpg, .png, .webp)
                    </p>
                </div>

                <div
                    class="
                        flex
                        gap-4
                    "
                >
                    <div
                        class="
                            flex
                            h-12
                            min-w-0
                            flex-1
                            items-center
                            rounded-lg
                            border
                            border-scholarhub-border-strong/50
                            bg-white
                            px-4
                            text-base
                            font-medium
                            leading-[1.2]
                        "
                    >
                        <span class="truncate">
                            {{ $profile_photo ? $profile_photo->getClientOriginalName() : 'No file selected' }}
                        </span>
                    </div>

                    <label
                        class="
                            flex
                            h-12
                            cursor-pointer
                            items-center
                            justify-center
                            gap-2.5
                            rounded-lg
                            bg-scholarhub-primary
                            py-1.5
                            pl-3.5
                            pr-4
                            text-[13px]
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                        "
                    >
                        <x-lucide-file-plus class="h-5 w-5" />
                        Browse File
                        <input
                            type="file"
                            wire:model="profile_photo"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            class="sr-only"
                        >
                    </label>
                </div>

                @error('profile_photo')
                    <p class="text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </section>

        <section
            class="
                grid
                grid-cols-1
                gap-6
                md:grid-cols-2
            "
        >
            <h2 class="text-[25px] font-bold leading-[1.2] md:col-span-2">
                Profile Details
            </h2>

            <div class="flex flex-col gap-3 md:col-span-2">
                <label class="text-xl font-semibold leading-[1.2]">
                    Full Name
                </label>
                <input
                    type="text"
                    wire:model="full_name"
                    class="h-12 rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('full_name')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3 md:col-span-2">
                <label class="text-xl font-semibold leading-[1.2]">
                    Email
                </label>
                <input
                    type="email"
                    wire:model="email"
                    class="h-12 rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('email')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3 md:col-span-2">
                <label class="text-xl font-semibold leading-[1.2]">
                    University
                </label>
                <input
                    type="text"
                    wire:model="university"
                    class="h-12 rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('university')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label class="text-xl font-semibold leading-[1.2]">
                    Major
                </label>
                <input
                    type="text"
                    wire:model="major"
                    class="h-12 rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('major')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label class="text-xl font-semibold leading-[1.2]">
                    Current Semester
                </label>
                <input
                    type="number"
                    min="1"
                    wire:model="semester"
                    class="h-12 rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 text-base font-medium leading-[1.2] text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                >
                @error('semester')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </section>

        <section
            class="
                flex
                flex-col
                gap-6
                pb-10
            "
        >
            <h2 class="text-[25px] font-bold leading-[1.2]">
                Change Password
            </h2>

            <div class="flex flex-col gap-3">
                <label class="text-xl font-semibold leading-[1.2]">
                    Current Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        wire:model="current_password"
                        placeholder="Password"
                        class="h-12 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 pr-12 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                    >
                    <x-lucide-eye-off class="pointer-events-none absolute right-4 top-1/2 h-6 w-6 -translate-y-1/2" />
                </div>
                @error('current_password')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label class="text-xl font-semibold leading-[1.2]">
                    New Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        wire:model="new_password"
                        placeholder="Password"
                        class="h-12 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 pr-12 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                    >
                    <x-lucide-eye-off class="pointer-events-none absolute right-4 top-1/2 h-6 w-6 -translate-y-1/2" />
                </div>
                @error('new_password')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-3">
                <label class="text-xl font-semibold leading-[1.2]">
                    Confirm Password
                </label>
                <div class="relative">
                    <input
                        type="password"
                        wire:model="new_password_confirmation"
                        placeholder="Password"
                        class="h-12 w-full rounded-lg border border-scholarhub-border-strong/50 bg-white px-4 pr-12 text-base font-medium leading-[1.2] text-scholarhub-primary placeholder:text-scholarhub-primary focus:border-scholarhub-primary focus:outline-none focus:ring-2 focus:ring-scholarhub-active"
                    >
                    <x-lucide-eye-off class="pointer-events-none absolute right-4 top-1/2 h-6 w-6 -translate-y-1/2" />
                </div>
                @error('new_password_confirmation')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </section>

    </main>

</div>
