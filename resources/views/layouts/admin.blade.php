<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScholarHub Admin</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    @livewireStyles
</head>

<body class="bg-slate-100 text-slate-900">
    <div class="min-h-screen flex">
        <aside class="w-72 bg-slate-950 text-slate-100 flex flex-col justify-between">
            <div class="px-8 pt-8 pb-6">
                <div class="flex items-center gap-3 mb-10">
                    <div class="w-12 h-12 rounded-2xl bg-slate-200 text-slate-950 flex items-center justify-center text-xl font-bold">
                        S
                    </div>
                    <div>
                        <p class="text-sm uppercase text-slate-400 tracking-[0.2em]">ScholarHub</p>
                        <h1 class="text-xl font-semibold">Administrator</h1>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="/admin/dashboard" class="group flex items-center gap-3 rounded-3xl px-4 py-3 transition-colors {{ request()->is('admin/dashboard') ? 'bg-slate-100 text-slate-950' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="text-lg">🏠</span>
                        <span>Home</span>
                    </a>
                    <a href="/admin/students" class="group flex items-center gap-3 rounded-3xl px-4 py-3 transition-colors {{ request()->is('admin/students') ? 'bg-slate-100 text-slate-950' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="text-lg">👥</span>
                        <span>Students</span>
                    </a>
                    <a href="/admin/mentors" class="group flex items-center gap-3 rounded-3xl px-4 py-3 transition-colors {{ request()->is('admin/mentors') ? 'bg-slate-100 text-slate-950' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="text-lg">🎓</span>
                        <span>Mentors</span>
                    </a>
                    <a href="/admin/scholarships" class="group flex items-center gap-3 rounded-3xl px-4 py-3 transition-colors {{ request()->is('admin/scholarships*') ? 'bg-slate-100 text-slate-950' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="text-lg">📚</span>
                        <span>Scholarships</span>
                    </a>
                    <a href="/admin/documents" class="group flex items-center gap-3 rounded-3xl px-4 py-3 transition-colors {{ request()->is('admin/documents') ? 'bg-slate-100 text-slate-950' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="text-lg">📝</span>
                        <span>Documents</span>
                    </a>
                    <a href="/admin/mentor-earnings" class="group flex items-center gap-3 rounded-3xl px-4 py-3 transition-colors {{ request()->is('admin/mentor-earnings') ? 'bg-slate-100 text-slate-950' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        <span class="text-lg">💰</span>
                        <span>Revenue</span>
                    </a>
                </nav>
            </div>

            <div class="px-8 pb-8">
                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-5">
                    <p class="text-xs uppercase text-slate-500 tracking-[0.2em]">Admin ScholarHub</p>
                    <p class="mt-3 font-semibold text-slate-100">admin@scholarhub.com</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mt-6">
                    @csrf
                    <button type="submit" class="w-full rounded-3xl bg-rose-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-rose-500">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-8 xl:p-10">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>