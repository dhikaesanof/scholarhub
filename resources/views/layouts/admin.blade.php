<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <title>
        ScholarHub Admin
    </title>

</head>

<body>

    <div class="min-h-screen flex">

        {{-- Sidebar --}}

        <div
            class="
                w-64
                bg-gray-900
                text-white
                p-5
            "
        >

            <h1
                class="
                    text-2xl
                    font-bold
                    mb-6
                "
            >

                ScholarHub Admin

            </h1>

            <nav class="space-y-3">

                <a
                    href="/admin/dashboard"
                    class="
                        block
                        hover:text-blue-400
                    "
                >

                    Dashboard

                </a>

                <a
                    href="/admin/scholarships"
                    class="
                        block
                        hover:text-blue-400
                    "
                >

                    Scholarships

                </a>

                <a
                    href="/admin/assessment/questions"
                    class="
                        block
                        hover:text-blue-400
                    "
                >

                    Assessment

                </a>

            </nav>

        </div>

        {{-- Content --}}

        <div
            class="
                flex-1
                p-6
                bg-gray-100
            "
        >

            {{ $slot }}

        </div>

    </div>

</body>
</html>