<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-semibold text-slate-950">Mentor Management</h1>
            <p class="text-slate-600 mt-1">Tambah, kelola, dan pantau mentor aktif di ScholarHub.</p>
        </div>
        <button wire:click="toggleForm" class="inline-flex items-center rounded-3xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
            {{ $showForm ? 'Close Form' : 'Add Mentor' }}
        </button>
    </div>

    @if($showForm)
        <div class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
            <div class="grid gap-6 lg:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Full Name</label>
                    <input type="text" wire:model="full_name" placeholder="Enter full name" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                    @error('full_name') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Email</label>
                    <input type="email" wire:model="email" placeholder="example@mail.com" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                    @error('email') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Password</label>
                    <input type="password" wire:model="password" placeholder="••••••••" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                    @error('password') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Specialization</label>
                    <input type="text" wire:model="specialization" placeholder="e.g. Scholarship Essay" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                    @error('specialization') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">University</label>
                    <input type="text" wire:model="university" placeholder="Enter university" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Major</label>
                    <input type="text" wire:model="major" placeholder="Enter major" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Session Price</label>
                    <input type="number" wire:model="session_price" placeholder="e.g. 75000" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                </div>
            </div>
            <div class="mt-6 grid gap-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Bio</label>
                    <textarea wire:model="bio" rows="3" placeholder="Mentor short bio" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Achievements</label>
                    <textarea wire:model="achievements" rows="3" placeholder="Achievements and awards" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none"></textarea>
                </div>
            </div>
            <div class="mt-6 flex justify-end">
                <button wire:click="save" class="rounded-3xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Save Mentor</button>
            </div>
        </div>
    @endif

    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse($mentors as $mentor)
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm text-slate-500">Mentor</p>
                        <h2 class="mt-2 text-xl font-semibold text-slate-950">{{ $mentor->user->name }}</h2>
                    </div>
                    <span class="rounded-2xl bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700">{{ $mentor->is_blocked ? 'Non-active' : 'Active' }}</span>
                </div>
                <p class="mt-4 text-sm text-slate-600">{{ $mentor->mentor?->university ?? '-' }}</p>
                <p class="text-sm text-slate-600">{{ $mentor->mentor?->specialization ?? '-' }}</p>
                <p class="mt-4 text-sm text-slate-500">{{ $mentor->email }}</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <button wire:click="toggleBlock({{ $mentor->id }})" class="rounded-2xl bg-rose-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-rose-700">{{ $mentor->is_blocked ? 'Activate' : 'Deactivate' }}</button>
                    <button class="rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-900">Manage Mentor</button>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-10 text-center text-slate-500">
                No mentors available yet. Tambahkan mentor baru untuk memulai.
            </div>
        @endforelse
    </div>
</div>