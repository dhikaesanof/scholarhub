<div>

{{-- PROFILE SUCCESS --}}

    @if(session()->has('success'))

        <div
            class="
                bg-green-100
                text-green-700
                px-5
                py-4
                rounded-2xl
                mb-6
            "
        >

            {{ session('success') }}

        </div>

    @endif

    {{-- PASSWORD SUCCESS --}}

    @if(session()->has('password_success'))

        <div
            class="
                bg-blue-100
                text-blue-700
                px-5
                py-4
                rounded-2xl
                mb-6
            "
        >

            {{ session('password_success') }}

        </div>

    @endif

    {{-- ERROR --}}

    @if(session()->has('error'))

        <div
            class="
                bg-red-100
                text-red-700
                px-5
                py-4
                rounded-2xl
                mb-6
            "
        >

            {{ session('error') }}

        </div>

    @endif

    {{-- PAGE TITLE --}}

    <div class="mb-10">

        <h1
            class="
                text-4xl
                font-bold
                text-[#1E3A6D]
            "
        >

            Mentor Profile

        </h1>

    </div>

    {{-- TOP PROFILE --}}

    <div
        class="
            bg-white
            rounded-3xl
            border
            p-10
            mb-10
        "
    >

        <div class="flex gap-8">

            {{-- PHOTO --}}

            <img

                src="

                    {{
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

                        : 'https://placehold.co/300x300?text=Mentor'
                    }}

                "

                class="
                    w-40
                    h-40
                    rounded-3xl
                    object-cover
                "
            >

            {{-- PROFILE INFO --}}

            <div class="flex-1">

                <h2
                    class="
                        text-4xl
                        font-bold
                        text-[#1E3A6D]
                    "
                >

                    {{ auth()->user()->name }}

                </h2>

                <p
                    class="
                        text-xl
                        text-gray-500
                        mt-2
                    "
                >

                    {{ $mentor->university }}

                </p>

                <p
                    class="
                        text-lg
                        text-[#1E3A6D]
                        mt-2
                    "
                >

                    {{ $mentor->achievement }}

                </p>

                {{-- STATS --}}

                <div
                    class="
                        flex
                        flex-col
                        gap-4
                        mt-8
                    "
                >

                    <div class="flex items-center gap-4">

                        <p
                            class="
                                w-20
                                text-gray-400
                                font-semibold
                            "
                        >

                            Status

                        </p>

                        <div
                            class="
                                bg-green-100
                                text-green-700
                                px-4
                                py-1
                                rounded-full
                                font-semibold
                            "
                        >

                            Active

                        </div>

                    </div>

                    <div class="flex items-center gap-4">

                        <p
                            class="
                                w-20
                                text-gray-400
                                font-semibold
                            "
                        >

                            Rating

                        </p>

                        <div
                            class="
                                bg-yellow-100
                                text-yellow-700
                                px-4
                                py-1
                                rounded-full
                                font-semibold
                            "
                        >

                            ⭐
                            {{
                                number_format(
                                    $averageRating,
                                    1
                                )
                            }}

                        </div>

                    </div>

                    <div class="flex items-center gap-4">

                        <p
                            class="
                                w-20
                                text-gray-400
                                font-semibold
                            "
                        >

                            Fee

                        </p>

                        <p
                            class="
                                text-[#1E3A6D]
                                font-bold
                                text-xl
                            "
                        >

                            Rp75.000/session

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- DETAIL PROFILE --}}

    <div
        class="
            bg-white
            rounded-3xl
            border
            p-10
        "
    >

        <div
            class="
                flex
                justify-between
                items-center
                mb-10
            "
        >

            <h2
                class="
                    text-3xl
                    font-bold
                    text-[#1E3A6D]
                "
            >

                Mentor Profile

            </h2>

            <a

                href="/mentor/profile/edit"

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

                Edit Profile

            </a>

        </div>

        {{-- PROFILE DETAIL --}}

        <div
            class="
                grid
                grid-cols-[200px_1fr]
                gap-y-8
                text-lg
            "
        >

            <p class="text-gray-400 font-semibold">

                Name

            </p>

            <p class="font-semibold text-[#1E3A6D]">

                {{ auth()->user()->name }}

            </p>

            <p class="text-gray-400 font-semibold">

                University

            </p>

            <p class="font-semibold text-[#1E3A6D]">

                {{ $mentor->university }}

            </p>

            <p class="text-gray-400 font-semibold">

                Major

            </p>

            <p class="font-semibold text-[#1E3A6D]">

                {{ $mentor->major }}

            </p>

            <p class="text-gray-400 font-semibold">

                Specialization

            </p>

            <p class="font-semibold text-[#1E3A6D]">

                {{ $mentor->specialization }}

            </p>

            <p class="text-gray-400 font-semibold">

                Achievement

            </p>

            <p class="font-semibold text-[#1E3A6D]">

                {{ $mentor->achievements }}

            </p>

            <p class="text-gray-400 font-semibold">

                Biography

            </p>

            <p class="font-semibold text-[#1E3A6D]">

                {{ $mentor->bio }}

            </p>

        </div>

        {{-- CONTACTS --}}

        <div class="mt-16">

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
                    grid-cols-[200px_1fr]
                    gap-y-8
                    text-lg
                "
            >

                <p class="text-gray-400 font-semibold">

                    Telegram

                </p>

                <p class="font-semibold text-[#1E3A6D]">

                    {{ $mentor->telegram_link }}

                </p>

                <p class="text-gray-400 font-semibold">

                    Google Meet

                </p>

                <p class="font-semibold text-[#1E3A6D]">

                    {{ $mentor->gmeet_link }}

                </p>

                <p class="text-gray-400 font-semibold">

                    Instagram

                </p>

                <p class="font-semibold text-[#1E3A6D]">

                    {{ $mentor->instagram_username }}

                </p>

                <p class="text-gray-400 font-semibold">

                    Email

                </p>

                <p class="font-semibold text-[#1E3A6D]">

                    {{ auth()->user()->email }}

                </p>

            </div>

        </div>

    </div>

</div>