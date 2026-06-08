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

<body
    class="
        bg-[#F5F7FB]
    "
>

    <div class="min-h-screen flex">

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
                                w-8
                                h-8
                                text-white
                            "
                        />

                    </div>

                    <div>

                        <h1
                            class="
                                text-2xl
                                font-bold
                                text-[#1B2B5B]
                            "
                        >

                            ScholarHub

                        </h1>

                        <p
                            class="
                                text-orange-400
                                text-md
                                font-semibold
                            "
                        >

                            Administrator

                        </p>

                    </div>

                </div>

                {{-- NAVIGATION --}}

                <nav class="space-y-3">

                    {{-- HOME --}}

                    <a
                        href="/admin/dashboard"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is(
                                    'admin/dashboard'
                                )

                                ?

                                'bg-blue-100 text-[#1B2B5B] font-semibold'

                                :

                                'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-house
                            class="
                                w-6
                                h-6
                            "
                        />

                        <span>

                            Home

                        </span>

                    </a>

                    {{-- STUDENTS --}}

                    <a
                        href="/admin/students"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is(
                                    'admin/students'
                                )

                                ?

                                'bg-blue-100 text-[#1B2B5B] font-semibold'

                                :

                                'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-user
                            class="
                                w-6
                                h-6
                            "
                        />

                        <span>

                            Students

                        </span>

                    </a>

                    {{-- MENTORS --}}

                    <a
                        href="/admin/mentors"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is(
                                    'admin/mentors'
                                )

                                ?

                                'bg-blue-100 text-[#1B2B5B] font-semibold'

                                :

                                'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-user-star
                            class="
                                w-6
                                h-6
                            "
                        />

                        <span>

                            Mentors

                        </span>

                    </a>

                    {{-- SCHOLARSHIPS --}}

                    <a
                        href="/admin/scholarships"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is(
                                    'admin/scholarships*'
                                )

                                ?

                                'bg-blue-100 text-[#1B2B5B] font-semibold'

                                :

                                'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-graduation-cap
                            class="
                                w-6
                                h-6
                            "
                        />

                        <span>

                            Scholarships

                        </span>

                    </a>

                    {{-- DOCUMENTS --}}

                    <a
                        href="/admin/documents"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is(
                                    'admin/documents'
                                )

                                ?

                                'bg-blue-100 text-[#1B2B5B] font-semibold'

                                :

                                'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-file-text
                            class="
                                w-6
                                h-6
                            "
                        />

                        <span>

                            Documents

                        </span>

                    </a>

                    {{-- REVENUE --}}

                    <a
                        href="/admin/mentor-earnings"

                        class="
                            flex
                            items-center
                            gap-4
                            px-5
                            py-4
                            rounded-2xl
                            transition

                            {{
                                request()->is(
                                    'admin/mentor-earnings'
                                )

                                ?

                                'bg-blue-100 text-[#1B2B5B] font-semibold'

                                :

                                'text-[#1B2B5B] hover:bg-blue-50 font-medium'
                            }}
                        "
                    >

                        <x-lucide-wallet
                            class="
                                w-6
                                h-6
                            "
                        />

                        <span>

                            Revenue

                        </span>

                    </a>

                </nav>

            </div>

            {{-- FOOTER --}}

            <div>

                <div
                    class="
                        border-t
                        pt-6
                    "
                >

                    <div class="mb-6">

                        <h3
                            class="
                                font-semibold
                                text-[#1B2B5B]
                            "
                        >

                            Admin ScholarHub

                        </h3>

                        <p
                            class="
                                text-sm
                                text-gray-400
                            "
                        >

                            admin@scholarhub.com

                        </p>

                    </div>

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
                                    w-5
                                    h-5
                                "
                            />

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </aside>

        {{-- CONTENT --}}

        <main
            class="
                flex-1
                p-8
            "
        >

            {{ $slot }}

        </main>

    </div>

</body>
</html>
