@auth
    <div
    class="
        -m-10
        min-h-full
        bg-scholarhub-background
    "
>

    {{-- HEADER --}}

    <div
        class="
            flex
            min-h-[90px]
            flex-col
            gap-4
            px-8
            py-6
            sm:flex-row
            sm:items-center
            sm:justify-between
        "
    >

        <h1
            class="
                text-[25px]
                font-bold
                leading-[1.2]
                text-scholarhub-primary
            "
        >

            Find Your Mentor

        </h1>

        <a
            href="/student/bookings"
            class="
                inline-flex
                h-10
                items-center
                justify-center
                gap-2.5
                rounded-lg
                bg-scholarhub-primary
                py-[5px]
                pl-3
                pr-4
                text-[13px]
                font-semibold
                leading-[1.2]
                text-scholarhub-background
                transition
                hover:bg-scholarhub-primary-active
                focus:outline-none
                focus:ring-2
                focus:ring-scholarhub-primary
                focus:ring-offset-2
            "
        >

            <x-lucide-history
                class="
                    h-5
                    w-5
                "
            />

            <span>

                Booking History

            </span>

        </a>

    </div>

    {{-- MENTOR GRID --}}

    <div
        class="
            grid
            grid-cols-1
            gap-6
            px-8
            pb-8
            md:grid-cols-2
            xl:grid-cols-3
        "
    >

        @forelse($mentors as $mentor)

            <article
                class="
                    flex
                    min-h-[228px]
                    flex-col
                    justify-between
                    gap-4
                    overflow-hidden
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-4
                "
            >

                <div
                    class="
                        flex
                        flex-col
                        gap-4
                    "
                >

                    @if($mentor->user->profile_photo)

                        <img
                            src="{{
                                Str::startsWith(
                                    $mentor->user->profile_photo,
                                    'http'
                                )
                                    ? $mentor->user->profile_photo
                                    : asset(
                                        'storage/' .
                                        $mentor->user->profile_photo
                                    )
                            }}"
                            alt="{{ $mentor->user->name }}"
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
                            min-w-0
                            flex-col
                            gap-2
                        "
                    >

                        <h2
                            class="
                                truncate
                                text-xl
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-primary
                            "
                        >

                            {{ $mentor->user->name }}

                        </h2>

                        <p
                            class="
                                truncate
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-primary
                            "
                        >

                            {{ $mentor->specialization }}

                        </p>

                        <p
                            class="
                                truncate
                                text-[13px]
                                font-medium
                                leading-[1.2]
                                text-scholarhub-muted
                            "
                        >

                            {{ $mentor->bio }}

                        </p>

                    </div>

                </div>

                <div
                    class="
                        border-t
                        border-scholarhub-border
                        pt-4
                    "
                >

                    <a
                        href="/mentors/{{ $mentor->id }}"
                        class="
                            flex
                            h-9
                            w-full
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-6
                            py-2.5
                            text-center
                            text-[13px]
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                            transition
                            hover:bg-scholarhub-primary-active
                            focus:outline-none
                            focus:ring-2
                            focus:ring-scholarhub-primary
                            focus:ring-offset-2
                        "
                    >

                        Book Mentor

                    </a>

                </div>

            </article>

        @empty

            <div
                class="
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-4
                    text-[13px]
                    font-medium
                    leading-[1.2]
                    text-scholarhub-muted
                    md:col-span-2
                    xl:col-span-3
                "
            >

                No mentors are available yet.

            </div>

        @endforelse

    </div>

    </div>
@else
    <div class="p-8">

        {{-- HEADER --}}

        <div class="mb-8">

            <h1
                class="
                    text-4xl
                    font-bold
                    text-gray-900
                "
            >

                Find Mentors

            </h1>

            <p
                class="
                    mt-2
                    text-gray-500
                "
            >

                Connect with experienced scholarship awardees and mentors.

            </p>

        </div>

        {{-- MENTOR GRID --}}

        <div
            class="
                grid
                grid-cols-1
                gap-6
                md:grid-cols-2
                xl:grid-cols-3
            "
        >

            @forelse($mentors as $mentor)

                <article
                    class="
                        flex
                        flex-col
                        justify-between
                        rounded-3xl
                        border
                        bg-white
                        p-6
                        shadow-sm
                        transition
                        hover:shadow-md
                    "
                >

                    <div>

                        <div class="mb-5">

                            @if($mentor->user->profile_photo)

                                <img
                                    src="{{
                                        Str::startsWith(
                                            $mentor->user->profile_photo,
                                            'http'
                                        )
                                            ? $mentor->user->profile_photo
                                            : asset(
                                                'storage/' .
                                                $mentor->user->profile_photo
                                            )
                                    }}"
                                    alt="{{ $mentor->user->name }}"
                                    class="
                                        h-24
                                        w-24
                                        rounded-2xl
                                        border
                                        object-cover
                                    "
                                >

                            @else

                                <div
                                    aria-hidden="true"
                                    class="
                                        h-24
                                        w-24
                                        rounded-2xl
                                        bg-gray-200
                                    "
                                ></div>

                            @endif

                        </div>

                        <h2
                            class="
                                text-3xl
                                font-bold
                                leading-tight
                                text-slate-800
                            "
                        >

                            {{ $mentor->user->name }}

                        </h2>

                        <p
                            class="
                                mt-3
                                text-lg
                                text-slate-600
                            "
                        >

                            {{ $mentor->specialization }}

                        </p>

                        <p
                            class="
                                mt-3
                                text-slate-700
                            "
                        >

                            {{ $mentor->user->email }}

                        </p>

                        <p
                            class="
                                mt-5
                                line-clamp-3
                                leading-7
                                text-gray-500
                            "
                        >

                            {{ $mentor->bio }}

                        </p>

                    </div>

                    <div
                        class="
                            mt-6
                            border-t
                            pt-5
                        "
                    >

                        <a
                            href="/mentors/{{ $mentor->id }}"
                            class="
                                block
                                w-full
                                rounded-2xl
                                bg-slate-800
                                py-3
                                text-center
                                font-medium
                                text-white
                                transition
                                hover:bg-slate-900
                            "
                        >

                            View Mentor

                        </a>

                    </div>

                </article>

            @empty

                <div
                    class="
                        rounded-2xl
                        border
                        bg-white
                        p-6
                        text-gray-500
                        md:col-span-2
                        xl:col-span-3
                    "
                >

                    No mentors are available yet.

                </div>

            @endforelse

        </div>

    </div>
@endauth
