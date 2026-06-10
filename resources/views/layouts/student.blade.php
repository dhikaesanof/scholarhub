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

<body class="bg-scholarhub-background">

    <div class="flex h-screen overflow-hidden">

        {{-- SIDEBAR --}}

        <aside
            class="
                flex
                h-screen
                w-[260px]
                shrink-0
                flex-col
                justify-between
                overflow-hidden
                border-r-2
                border-scholarhub-border
                bg-scholarhub-background
                p-6
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
                        gap-3
                        pb-8
                    "
                >

                    <div
                        class="
                            flex
                            h-10
                            w-10
                            items-center
                            justify-center
                            rounded-[10px]
                            bg-scholarhub-primary
                            p-[6.667px]
                        "
                    >

                        <x-lucide-school
                            class="
                                h-[26.667px]
                                w-[26.667px]
                                text-white
                            "
                        />

                    </div>

                    <h1
                        class="
                            text-[25px]
                            font-bold
                            leading-[1.2]
                            text-scholarhub-primary
                        "
                    >

                        ScholarHub

                    </h1>

                </div>

                {{-- MENU --}}

                <nav
                    class="
                        flex
                        flex-col
                        gap-2
                    "
                >

                    {{-- HOME --}}

                    <a

                        href="/dashboard"

                        class="
                            flex
                            items-center
                            gap-4
                            rounded-lg
                            px-4
                            py-3
                            transition

                            {{
                                request()->is('dashboard')

                                ? 'bg-scholarhub-active text-scholarhub-primary-active font-semibold'

                                : 'text-scholarhub-primary-dark hover:bg-scholarhub-border font-medium'
                            }}
                        "
                    >

                        <x-lucide-house
                            class="
                                h-6
                                w-6
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
                            rounded-lg
                            px-4
                            py-3
                            transition

                            {{
                                request()->is('scholarships*')

                                ? 'bg-scholarhub-active text-scholarhub-primary-active font-semibold'

                                : 'text-scholarhub-primary-dark hover:bg-scholarhub-border font-medium'
                            }}
                        "
                    >

                        <x-lucide-graduation-cap
                            class="
                                h-6
                                w-6
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
                            rounded-lg
                            px-4
                            py-3
                            transition

                            {{
                                request()->is('student/roadmaps*')

                                ? 'bg-scholarhub-active text-scholarhub-primary-active font-semibold'

                                : 'text-scholarhub-primary-dark hover:bg-scholarhub-border font-medium'
                            }}
                        "
                    >

                        <x-lucide-map
                            class="
                                h-6
                                w-6
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
                            rounded-lg
                            px-4
                            py-3
                            transition

                            {{
                                request()->is('mentors*')

                                ? 'bg-scholarhub-active text-scholarhub-primary-active font-semibold'

                                : 'text-scholarhub-primary-dark hover:bg-scholarhub-border font-medium'
                            }}
                        "
                    >

                        <x-lucide-user-star
                            class="
                                h-6
                                w-6
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
                            rounded-lg
                            px-4
                            py-3
                            transition

                            {{
                                request()->is('documents*') ||
                                request()->is('student/my-documents*') ||
                                request()->is('student/document-payments*') ||
                                request()->is('student/documents*')

                                ? 'bg-scholarhub-active text-scholarhub-primary-active font-semibold'

                                : 'text-scholarhub-primary-dark hover:bg-scholarhub-border font-medium'
                            }}
                        "
                    >

                        <x-lucide-file-text
                            class="
                                h-6
                                w-6
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
                    flex
                    flex-col
                    gap-2
                    border-t-2
                    border-scholarhub-border
                    pt-[18px]
                "
            >

                <a

                    href="/student/profile"

                    class="
                        flex
                        items-center
                        gap-4
                        rounded-lg
                        px-4
                        py-3
                        transition
                        {{
                            request()->is('student/profile*')
                                ? 'bg-scholarhub-active text-scholarhub-primary-active font-semibold'
                                : 'text-scholarhub-primary-dark hover:bg-scholarhub-border font-medium'
                        }}
                    "
                >

                    <x-lucide-user
                        class="
                            h-6
                            w-6
                        "
                    />

                    Profile

                </a>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="w-full"
                >

                    @csrf

                    <button
                        type="submit"

                        class="
                            flex
                            w-full
                            items-center
                            gap-4
                            rounded-lg
                            px-4
                            py-3
                            font-medium
                            text-scholarhub-primary-dark
                            transition
                            hover:bg-scholarhub-border
                        "
                    >

                        <x-lucide-log-out
                            class="
                                h-6
                                w-6
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
