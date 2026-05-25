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

<body class="bg-[#F6F7FB]">

    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}

        <aside
            class="
                w-64
                h-screen
                sticky
                top-0
                bg-white
                border-r
                flex
                flex-col
                justify-between
                px-6
                py-8
                shrink-0
            "
        >

            <div>

                {{-- LOGO --}}

                <div
                    class="
                        flex
                        items-center
                        gap-3
                        mb-10
                    "
                >

                    <div
                        class="
                            w-10
                            h-10
                            rounded-xl
                            bg-[#1E3A6D]
                            flex
                            items-center
                            justify-center
                            text-white
                            font-bold
                        "
                    >
                        🎓
                    </div>

                    <div>

                        <h1
                            class="
                                text-xl
                                font-bold
                                text-[#1E3A6D]
                            "
                        >
                            ScholarHub
                        </h1>

                        <p
                            class="
                                text-sm
                                text-green-600
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
                            gap-3
                            px-4
                            py-3
                            rounded-xl

                            {{
                                request()->routeIs('mentor.dashboard.*')

                                ? 'bg-blue-100 text-[#1E3A6D] font-semibold'

                                : 'text-gray-600 hover:bg-gray-100'
                            }}
                        "
                    >

                        🏠 Home

                    </a>

                    <a

                        href="{{ route('mentor.schedules') }}"

                        class="
                            flex
                            items-center
                            gap-3
                            px-4
                            py-3
                            rounded-xl

                            {{
                                request()->routeIs('mentor.schedules')

                                ? 'bg-blue-100 text-[#1E3A6D] font-semibold'

                                : 'text-gray-600 hover:bg-gray-100'
                            }}
                        "
                    >

                        📅 Schedule

                    </a>

                    <a

                        href="{{ route('mentor.profile') }}"

                        class="
                            flex
                            items-center
                            gap-3
                            px-4
                            py-3
                            rounded-xl

                            {{
                                request()->routeIs('mentor.profile.*')

                                ? 'bg-blue-100 text-[#1E3A6D] font-semibold'

                                : 'text-gray-600 hover:bg-gray-100'
                            }}
                        "
                    >

                        👤 Profile

                    </a>

                </nav>

            </div>

            {{-- PROFILE --}}

            <div
                class="
                    border-t
                    pt-5
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
                            text-red-500
                            font-medium
                        "
                    >

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