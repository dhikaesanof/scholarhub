<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-semibold text-slate-950">Mentor Earnings</h1>
            <p class="text-slate-600 mt-1">Monitor mentor transactions and total session income.</p>
        </div>
    </div>

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Mentor</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">University</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Paid Sessions</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Price per Session</th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-slate-600">Total Income</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 bg-white">
                @forelse($earnings as $data)
                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $data['mentor']->user->name }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $data['mentor']->university }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">{{ $data['total_sessions'] }}</td>
                        <td class="px-6 py-4 text-sm text-slate-600">Rp {{ number_format($data['mentor']->session_price) }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-emerald-700">Rp {{ number_format($data['income']) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-slate-500">No earnings data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>