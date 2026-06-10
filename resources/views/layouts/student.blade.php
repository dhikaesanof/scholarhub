<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>ScholarHub Student</title>

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
                                text-blue-700
                                text-lg
                                font-medium
                            "
                        >

                            Student

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

                    {{-- HOME --}}

                    <a

                        href="/dashboard"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is('dashboard')

                                ? 'bg-blue-100 text-[#1B2B5B] font-semibold'

                                : 'text-[#1B2B5B] hover:bg-blue-50 font-medium'
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

                    {{-- SCHOLARSHIPS --}}

                    <a

                        href="/scholarships"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is('scholarships*')

                                ? 'bg-blue-100 text-[#1B2B5B] font-semibold'

                                : 'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-graduation-cap
                            class="
                                w-7
                                h-7
                            "
                        />

                        <span>

                            Scholarships

                        </span>

                    </a>

                    {{-- ROADMAP --}}

                    <a

                        href="/student/roadmaps"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is('student/roadmaps*')

                                ? 'bg-blue-100 text-[#1B2B5B] font-semibold'

                                : 'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-map
                            class="
                                w-7
                                h-7
                            "
                        />

                        <span>

                            Roadmap

                        </span>

                    </a>

                    {{-- MENTORS --}}

                    <a

                        href="/mentors"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is('mentors*')

                                ? 'bg-blue-100 text-[#1B2B5B] font-semibold'

                                : 'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-user-round-search
                            class="
                                w-7
                                h-7
                            "
                        />

                        <span>

                            Mentors

                        </span>

                    </a>

                    {{-- DOCUMENTS --}}

                    <a

                        href="/documents"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is('documents*')

                                ? 'bg-blue-100 text-[#1B2B5B] font-semibold'

                                : 'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-file-text
                            class="
                                w-7
                                h-7
                            "
                        />

                        <span>

                            Documents

                        </span>

                    </a>

                </nav>

            </div>

            {{-- PROFILE SECTION --}}

            <div
                class="
                    border-t
                    pt-8
                    space-y-8
                "
            >

                <a

                    href="/student/profile"

                    class="
                        flex
                        items-center
                        gap-3
                        text-[#1B2B5B]
                        hover:text-blue-700
                        transition
                        font-medium
                    "
                >

                    <x-lucide-user
                        class="
                            w-7
                            h-7
                        "
                    />

                    Profile

                </a>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
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