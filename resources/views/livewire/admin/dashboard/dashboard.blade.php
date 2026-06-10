<div class="space-y-8">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <p class="text-sm text-slate-500">Hello, Admin-1!</p>
            <h1 class="text-4xl font-semibold text-slate-950">Welcome to Admin Dashboard</h1>
            <p class="text-slate-600 mt-2">Pantau ringkasan sistem ScholarHub secara real-time.</p>
        </div>
        <div class="rounded-3xl bg-white border border-slate-200 px-5 py-4 shadow-sm text-right">
            <p class="text-sm text-slate-500">Terakhir diperbarui</p>
            <p class="text-lg font-semibold text-slate-900">{{ now()->format('d M Y, H:i') }}</p>
        </div>
    </div>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-sm">
            <p class="text-sm text-slate-500">Total Students</p>
            <h2 class="mt-4 text-4xl font-semibold text-slate-950">{{ $totalStudents }}</h2>
            <p class="mt-3 text-sm text-slate-600">{{ $activeStudents }} active this month</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-sm">
            <p class="text-sm text-slate-500">Total Mentors</p>
            <h2 class="mt-4 text-4xl font-semibold text-slate-950">{{ $totalMentors }}</h2>
            <p class="mt-3 text-sm text-slate-600">Avg. Rating {{ number_format($averageRating, 2) }}</p>
        </div>
        <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 shadow-sm">
            <p class="text-sm text-slate-500">Total Scholarships</p>
            <h2 class="mt-4 text-4xl font-semibold text-slate-950">{{ $totalScholarships }}</h2>
            <p class="mt-3 text-sm text-slate-600">{{ $pendingScholarships }} pending</p>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
            <p class="text-sm text-slate-500">Document Sales</p>
            <h2 class="mt-4 text-3xl font-semibold text-slate-950">{{ $totalDocumentSales }}</h2>
            <p class="mt-3 text-sm text-slate-600">Total successful document transactions</p>
        </div>
        <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
            <p class="text-sm text-slate-500">Document Revenue</p>
            <h2 class="mt-4 text-3xl font-semibold text-emerald-700">Rp {{ number_format($monthlyRevenue) }}</h2>
            <p class="mt-3 text-sm text-slate-600">Current month earnings</p>
        </div>
        <div class="rounded-3xl bg-white border border-slate-200 p-6 shadow-sm">
            <p class="text-sm text-slate-500">Top Selling Document</p>
            <h2 class="mt-4 text-3xl font-semibold text-slate-950">{{ optional($topSellingDocument)->title ?? 'No documents yet' }}</h2>
            <p class="mt-3 text-sm text-slate-600">Most downloaded premium guide</p>
        </div>
    </section>

    <section>
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-semibold text-slate-950">Recent Bookings</h2>
                <p class="text-slate-600 mt-1">Review booking activity and payment status.</p>
            </div>
            <a href="/admin/mentor-bookings" class="rounded-3xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">View All</a>
        </div>
        <div class="space-y-4">
            @forelse($recentBookings as $booking)
                <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <p class="text-sm text-slate-500">{{ $booking->student->user->name }} booked {{ $booking->mentor->user->name }}</p>
                        <p class="mt-2 text-lg font-semibold text-slate-900">{{ $booking->topic }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center rounded-full bg-emerald-100 px-4 py-2 text-sm font-medium text-emerald-700">{{ $booking->payment_status }}</span>
                        <span class="text-sm text-slate-500">{{ $booking->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-8 text-center text-slate-500">No recent bookings available.</div>
            @endforelse
        </div>
    </section>
</div>
