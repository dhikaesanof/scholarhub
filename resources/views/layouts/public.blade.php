<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="
            width=device-width,
            initial-scale=1.0
        "
    >

    <title>

        ScholarHub

    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @livewireStyles

</head>

<body
    class="
        bg-gray-50
        min-h-screen
    "
>

{{-- NAVBAR --}}

    <nav
        class="
            bg-white
            border-b
            sticky
            top-0
            z-50
        "
    >

        <div
            class="
                max-w-7xl
                mx-auto
                px-6
                py-5
                flex
                justify-between
                items-center
            "
        >

            <a
                href="/"
                class="
                    text-2xl
                    font-bold
                    text-blue-600
                "
            >

                ScholarHub

            </a>

            <div
                class="
                    hidden
                    md:flex
                    items-center
                    gap-8
                "
            >

                <a
                    href="/scholarships"
                    class="text-gray-600 hover:text-blue-600"
                >

                    Scholarships

                </a>

                <a
                    href="/mentors"
                    class="text-gray-600 hover:text-blue-600"
                >

                    Mentors

                </a>

                <a
                    href="/documents"
                    class="text-gray-600 hover:text-blue-600"
                >

                    Documents

                </a>

            </div>

            <div
                class="
                    flex
                    items-center
                    gap-4
                "
            >

                @auth

                    <a

                        href="/dashboard"

                        class="
                            text-gray-700
                            font-medium
                        "
                    >

                        Dashboard

                    </a>

                @else

                    <a

                        href="/login"

                        class="
                            text-gray-700
                            font-medium
                        "
                    >

                        Login

                    </a>

                    <a

                        href="/register"

                        class="
                            bg-blue-600
                            hover:bg-blue-700
                            text-white
                            px-5
                            py-2
                            rounded-xl
                            transition
                        "
                    >

                        Get Started

                    </a>

                @endauth

            </div>

        </div>

    </nav>

    <main
        class="
            max-w-7xl
            mx-auto
            px-6
            py-10
        "
    >

    {{ $slot }}

    @livewireScripts
    
    </main>

</body>

</html>