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
        $student = $user->student;
        $photo = $user->profile_photo
            ? (
                Str::startsWith(
                    $user->profile_photo,
                    'http'
                )
                    ? $user->profile_photo
                    : asset('storage/' . $user->profile_photo)
            )
            : null;
    @endphp

    <header
        class="
            flex
            h-[90px]
            items-center
            px-8
            py-6
        "
    >
        <h1
            class="
                text-[25px]
                font-bold
                leading-[1.2]
            "
        >
            Your Profile
        </h1>
    </header>

    @if(session()->has('success'))
        <div
            class="
                mx-auto
                w-full
                max-w-[860px]
                px-6
                pb-4
                lg:px-0
            "
        >
            <div
                class="
                    rounded-lg
                    border
                    border-green-200
                    bg-green-50
                    p-4
                    text-sm
                    font-medium
                    text-green-700
                "
            >
                {{ session('success') }}
            </div>
        </div>
    @endif

    <main
        class="
            mx-auto
            flex
            w-full
            max-w-[860px]
            flex-col
            items-start
            gap-6
            px-6
            py-6
            lg:px-0
        "
    >

        @if($photo)
            <img
                src="{{ $photo }}"
                alt="{{ $user->name }}"
                class="
                    h-[120px]
                    w-[120px]
                    rounded-lg
                    object-cover
                "
            >
        @else
            <div
                aria-hidden="true"
                class="
                    h-[120px]
                    w-[120px]
                    rounded-lg
                    bg-[#d9d9d9]
                "
            ></div>
        @endif

        <section
            class="
                flex
                w-full
                flex-col
                gap-4
            "
        >

            <h2
                class="
                    text-[31px]
                    font-bold
                    leading-[1.2]
                "
            >
                {{ $user->name }}
            </h2>

            <dl
                class="
                    grid
                    grid-cols-[max-content_minmax(0,1fr)]
                    gap-x-4
                    gap-y-4
                    text-base
                    font-semibold
                    leading-[1.2]
                "
            >
                <dt class="text-scholarhub-muted-light">
                    University
                </dt>
                <dd>
                    {{ $student->university ?: '-' }}
                </dd>

                <dt class="text-scholarhub-muted-light">
                    Major
                </dt>
                <dd>
                    {{ $student->major ?: '-' }}
                </dd>

                <dt class="text-scholarhub-muted-light">
                    Current Semester
                </dt>
                <dd>
                    {{ $student->semester ?: '-' }}
                </dd>
            </dl>

        </section>

        <div
            class="
                flex
                w-full
                border-t
                border-scholarhub-border
                pt-4
            "
        >
            <a
                href="/student/profile/edit"
                class="
                    flex
                    h-9
                    items-center
                    justify-center
                    rounded-lg
                    bg-scholarhub-primary
                    px-6
                    text-[13px]
                    font-semibold
                    leading-[1.2]
                    text-scholarhub-background
                "
            >
                Edit Profile
            </a>
        </div>

    </main>

</div>
