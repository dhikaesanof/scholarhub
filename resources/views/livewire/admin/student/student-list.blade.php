<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-semibold text-slate-950">Student Management</h1>
            <p class="text-slate-600 mt-1">Kelola akun siswa, status, dan akses.</p>
        </div>
    </div>

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Name</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Email</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Role</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Status</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse($students as $student)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $student->name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $student->email }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ ucfirst(strtolower($student->role)) }}</td>
                        <td class="px-6 py-4">
                            @if($student->is_blocked)
                                <span class="inline-flex rounded-full bg-rose-100 px-3 py-1 text-sm font-medium text-rose-700">Non-active</span>
                            @else
                                <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-sm font-medium text-emerald-700">Active</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <button wire:click="toggleBlock({{ $student->id }})" class="rounded-2xl px-4 py-2 text-sm font-semibold text-white transition {{ $student->is_blocked ? 'bg-slate-700 hover:bg-slate-800' : 'bg-rose-600 hover:bg-rose-700' }}">
                                {{ $student->is_blocked ? 'Activate' : 'Deactivate' }}
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-500">Tidak ada siswa terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>