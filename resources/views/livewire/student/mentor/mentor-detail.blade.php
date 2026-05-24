<div class="p-8">

    {{-- TOP PROFILE SECTION --}}

    <div
        class="
            bg-white
            border
            rounded-3xl
            shadow-sm
            overflow-hidden
            mb-8
        "
    >

        <div
            class="
                p-8
                flex
                flex-col
                lg:flex-row
                gap-8
            "
        >

            {{-- PROFILE PHOTO --}}

            <div>

                @if($mentor->user->profile_photo)

                    <img

                        src="
                            {{
                                asset(
                                    'storage/' .
                                    $mentor->user->profile_photo
                                )
                            }}
                        "

                        class="
                            w-52
                            h-52
                            object-cover
                            rounded-3xl
                            border
                        "
                    >

                @else

                    <div
                        class="
                            w-52
                            h-52
                            rounded-3xl
                            border
                            bg-gray-100
                            flex
                            items-center
                            justify-center
                            text-gray-400
                            text-lg
                        "
                    >

                        No Photo

                    </div>

                @endif

            </div>

            {{-- MAIN CONTENT --}}

            <div class="flex-1">

                <h1
                    class="
                        text-4xl
                        font-bold
                        text-gray-900
                    "
                >

                    {{ $mentor->user->name }}

                </h1>

                {{-- RATING --}}

                <div
                    class="
                        flex
                        items-center
                        gap-3
                        mt-4
                    "
                >

                    <div
                        class="
                            flex
                            items-center
                            gap-2
                            bg-yellow-100
                            text-yellow-700
                            px-4
                            py-2
                            rounded-full
                        "
                    >

                        <span class="text-lg">
                            ⭐
                        </span>

                        <span class="font-semibold">

                            {{
                                number_format(
                                    $mentor->average_rating ?? 0,
                                    1
                                )
                            }}

                        </span>

                    </div>

                    <span
                        class="
                            text-gray-500
                        "
                    >

                        {{
                            $reviews->count()
                        }}
                        reviews

                    </span>

                </div>

                {{-- SPECIALIZATION --}}

                <div class="mt-6">

                    <span
                        class="
                            bg-blue-100
                            text-blue-700
                            px-4
                            py-2
                            rounded-full
                            text-sm
                        "
                    >

                        {{ $mentor->specialization }}

                    </span>

                </div>

                {{-- BIO --}}

                <div class="mt-8">

                    <h2
                        class="
                            text-xl
                            font-bold
                            mb-3
                        "
                    >

                        About Mentor

                    </h2>

                    <p
                        class="
                            text-gray-600
                            leading-8
                        "
                    >

                        {{ $mentor->bio }}

                    </p>

                </div>

                {{-- SOCIAL LINKS --}}

                <div
                    class="
                        flex
                        flex-wrap
                        gap-4
                        mt-8
                    "
                >

                    @if($mentor->instagram_username)

                        <a

                            href="
                                https://instagram.com/{{ $mentor->instagram_username }}
                            "

                            target="_blank"

                            class="
                                bg-pink-100
                                text-pink-700
                                px-4
                                py-2
                                rounded-xl
                                text-sm
                            "
                        >

                            Instagram

                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- SLOT SECTION --}}

    <div
        class="
            bg-white
            border
            rounded-3xl
            shadow-sm
            p-8
        "
    >

        <div
            class="
                flex
                items-center
                justify-between
                mb-8
            "
        >

            <div>

                <h2
                    class="
                        text-3xl
                        font-bold
                        text-gray-900
                    "
                >

                    Available Slots

                </h2>

                <p
                    class="
                        text-gray-500
                        mt-1
                    "
                >

                    Choose your preferred mentoring session.

                </p>

            </div>

        </div>

        {{-- ALERTS --}}

        @if(session()->has('success'))

            <div
                class="
                    bg-green-100
                    text-green-700
                    p-4
                    rounded-2xl
                    mb-6
                "
            >

                {{ session('success') }}

            </div>

        @endif

        @if(session()->has('error'))

            <div
                class="
                    bg-red-100
                    text-red-700
                    p-4
                    rounded-2xl
                    mb-6
                "
            >

                {{ session('error') }}

            </div>

        @endif

        {{-- SLOT LIST --}}

        <div class="space-y-5">

            @forelse($availabilities as $slot)

                <div
                    class="
                        border
                        rounded-2xl
                        p-6
                        flex
                        flex-col
                        lg:flex-row
                        justify-between
                        lg:items-center
                        gap-5
                    "
                >

                    {{-- SLOT INFO --}}

                    <div>

                        <h3
                            class="
                                text-xl
                                font-bold
                                text-gray-900
                            "
                        >

                            {{
                                \Carbon\Carbon::parse(
                                    $slot->date
                                )->format('d M Y')
                            }}

                        </h3>

                        <p
                            class="
                                text-gray-600
                                mt-2
                            "
                        >

                            {{
                                $slot->start_time
                            }}
                            -
                            {{
                                $slot->end_time
                            }}

                        </p>

                    </div>

                    {{-- PRICE + BUTTON --}}

                    <div
                        class="
                            flex
                            items-center
                            gap-5
                        "
                    >

                        <div>

                            <p
                                class="
                                    text-sm
                                    text-gray-500
                                "
                            >

                                Session Price

                            </p>

                            <h3
                                class="
                                    text-2xl
                                    font-bold
                                    text-gray-900
                                "
                            >

                                Rp75.000

                            </h3>

                        </div>

                        <a

                            href="
                                /student/bookings/create/{{ $slot->id }}
                            "

                            class="
                                bg-blue-600
                                hover:bg-blue-700
                                text-white
                                px-6
                                py-3
                                rounded-2xl
                                transition
                                font-medium
                            "
                        >

                            Book Session

                        </a>

                    </div>

                </div>

            @empty

                <div
                    class="
                        bg-gray-50
                        border
                        rounded-2xl
                        p-10
                        text-center
                        text-gray-500
                    "
                >

                    No available slots yet.

                </div>

            @endforelse

        </div>

    </div>

</div>