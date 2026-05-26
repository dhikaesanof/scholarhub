<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>ScholarHub Mentor</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @livewireStyles

</head>

<body class="bg-[#F5F7FB]">

    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}

        <aside
            class="
                w-72
                bg-white
                border-r
                px-6
                py-8
                flex
                flex-col
                justify-between
                h-screen
                sticky
                top-0
            "
        >

            <div>

                {{-- LOGO --}}

                <div
                    class="
                        flex
                        items-center
                        gap-4
                        mb-12
                    "
                >

                    <div
                        class="
                            w-14
                            h-14
                            rounded-2xl
                            bg-blue-950
                            flex
                            items-center
                            justify-center
                        "
                    >

                        <x-lucide-school
                            class="
                                w-7
                                h-7
                                text-white
                            "
                        />

                    </div>

                    <div>

                        <h1
                            class="
                                text-3xl
                                font-bold
                                text-[#1B2B5B]
                            "
                        >

                            ScholarHub

                        </h1>

                        <p
                            class="
                                text-green-700
                                text-lg
                                font-medium
                            "
                        >

                            Mentor

                        </p>

                    </div>

                </div>

                {{-- MENU --}}

                <nav
                    class="
                        flex
                        flex-col
                        gap-3
                    "
                >

                    <a

                        href="{{ route('mentor.dashboard.dashboard') }}"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition
                            font-semibold

                            {{
                                request()->routeIs('mentor.dashboard.*')

                                ? 'bg-blue-100 text-[#1E3A6D] font-semibold'

                                : 'text-gray-600 hover:bg-gray-100'
                            }}
                        "
                    >

                        <x-lucide-house
                            class="
                                w-7
                                h-7
                            "
                        />

                        <span>

                            Home

                        </span>

                    </a>

                    <a

                        href="{{ route('mentor.schedules') }}"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition
                            font-semibold

                            {{
                                request()->routeIs('mentor.schedules')

                                ? 'bg-blue-100 text-[#1E3A6D] font-semibold'

                                : 'text-gray-600 hover:bg-gray-100'
                            }}
                        "
                    >

                        <x-lucide-calendar-days
                            class="
                                w-7
                                h-7
                            "
                        />

                        <span>

                            Schedule

                        </span>

                    </a>

                    <a

                        href="{{ route('mentor.profile') }}"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition
                            font-semibold

                            {{
                                request()->routeIs('mentor.profile*')

                                ? 'bg-blue-100 text-[#1E3A6D] font-semibold'

                                : 'text-gray-600 hover:bg-gray-100'
                            }}
                        "
                    >

                        <x-lucide-user
                            class="
                                w-7
                                h-7
                            "
                        />

                        <span>

                            Profile

                        </span>

                    </a>

                </nav>

            </div>

            {{-- PROFILE --}}

            <div
                class="
                    border-t
                    pt-8
                    space-y-8
                "
            >

                <div
                    class="
                        flex
                        items-center
                        gap-3
                    "
                >

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

                                : 'https://placehold.co/100x100?text=Mentor'
                            }}
                        "

                        class="
                            w-12
                            h-12
                            rounded-full
                            object-cover
                        "
                    >

                    <div>

                        <h2
                            class="
                                font-semibold
                                text-[#1E3A6D]
                                leading-tight
                            "
                        >

                            {{
                                auth()->user()->name
                            }}

                        </h2>

                    </div>

                </div>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="mt-5"
                >

                    @csrf

                    <button
                        type="submit"

                        class="
                            flex
                            items-center
                            gap-3
                            text-[#1B2B5B]
                            hover:text-red-500
                            transition
                            font-medium
                        "
                    >

                        <x-lucide-log-out
                            class="
                                w-7
                                h-7
                            "
                        />

                        Logout

                    </button>

                </form>

            </div>

        </aside>

        {{-- MAIN CONTENT --}}

        <main
            class="
                flex-1
                overflow-y-auto
                p-10
            "
        >

            {{ $slot }}

        </main>

    </div>

    @livewireScripts

</body>

</html>