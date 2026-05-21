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

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <title>

        Mentor Dashboard

    </title>

</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->

        <div
            class="
                w-64
                bg-white
                shadow-lg
                p-5
            "
        >

            <h1
                class="
                    text-2xl
                    font-bold
                    mb-8
                "
            >

                Mentor Panel

            </h1>

            <nav class="space-y-3">

                <a
                    href="/mentor/dashboard"
                    class="block text-gray-700"
                >
                    Dashboard
                </a>

                <a
                    href="/mentor/profile"
                    class="block text-gray-700"
                >
                    Profile
                </a>

                <a
                    href="/mentor/schedules"
                    class="block text-gray-700"
                >
                    Schedules
                </a>

            </nav>

            <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="mt-10"
                >

                    @csrf

                    <button
                        type="submit"

                        class="
                            w-full
                            bg-red-500
                            hover:bg-red-600
                            text-white
                            py-2
                            rounded-lg
                        "
                    >

                        Logout

                    </button>

                </form>

        </div>

        <!-- Content -->

        <div class="flex-1 p-8">

            {{ $slot }}

        </div>

    </div>

</body>
</html>