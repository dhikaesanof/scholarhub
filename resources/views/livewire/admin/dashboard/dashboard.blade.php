<div class="space-y-8">

    {{-- HEADER --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-gray-900">
                Dashboard Admin
            </h1>
            <p class="text-gray-600 mt-2">
                Pantau ringkasan sistem ScholarHub secara real-time
            </p>
        </div>
        <div class="text-right">
            <p class="text-sm text-gray-500">Terakhir diperbarui</p>
            <p class="text-lg font-semibold text-gray-900">{{ now()->format('d M Y, H:i') }}</p>
        </div>
    </div>

    {{-- PRIMARY STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Total Students Card --}}
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-6 rounded-2xl shadow-sm border border-blue-200 hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-600 text-sm font-medium">Total Siswa</p>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalStudents }}</h2>
                    <p class="text-blue-600 text-xs mt-2">{{ $activeStudents }} aktif bulan ini</p>
                </div>
                <div class="text-4xl"></div>
            </div>
        </div>

        {{-- Total Mentors Card --}}
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-6 rounded-2xl shadow-sm border border-purple-200 hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-600 text-sm font-medium">Total Mentor</p>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalMentors }}</h2>
                    <p class="text-purple-600 text-xs mt-2"> Rata-rata {{ number_format($averageRating, 2) }}</p>
                </div>
                <div class="text-4xl"></div>
            </div>
        </div>

        {{-- Total Scholarships Card --}}
        <div class="bg-gradient-to-br from-green-50 to-green-100 p-6 rounded-2xl shadow-sm border border-green-200 hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-green-600 text-sm font-medium">Total Beasiswa</p>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalScholarships }}</h2>
                    <p class="text-green-600 text-xs mt-2"> {{ $pendingScholarships }} pending</p>
                </div>
                <div class="text-4xl"></div>
            </div>
        </div>

        {{-- Total Bookings Card --}}
        <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-6 rounded-2xl shadow-sm border border-orange-200 hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-orange-600 text-sm font-medium">Total Booking</p>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">{{ $totalBookings }}</h2>
                    <p class="text-orange-600 text-xs mt-2">Rp {{ number_format($totalMentorEarnings) }}</p>
                </div>
                <div class="text-4xl"></div>
            </div>
        </div>

    </div>

    {{-- REVENUE STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Document Sales Card --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border hover:shadow-md transition-all">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-900 font-semibold">Penjualan Dokumen</h3>
                <span class="text-2xl"></span>
            </div>
            <h2 class="text-4xl font-bold text-gray-900">{{ $totalDocumentSales }}</h2>
            <p class="text-gray-500 text-sm mt-3">Total transaksi yang berhasil</p>
        </div>

        {{-- Monthly Revenue Card --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border hover:shadow-md transition-all">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-900 font-semibold">Pendapatan Bulan Ini</h3>
                <span class="text-2xl"></span>
            </div>
            <h2 class="text-3xl font-bold text-green-600">Rp {{ number_format($monthlyRevenue) }}</h2>
            <p class="text-gray-500 text-sm mt-3">Dari dokumen dan booking</p>
        </div>

        {{-- Total Revenue Card --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border hover:shadow-md transition-all">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-gray-900 font-semibold">Total Pendapatan</h3>
                <span class="text-2xl"></span>
            </div>
            <h2 class="text-3xl font-bold text-blue-600">Rp {{ number_format($totalDocumentRevenue) }}</h2>
            <p class="text-gray-500 text-sm mt-3">Dari semua penjualan</p>
        </div>

    </div>

    {{-- DAILY ACTIVITIES --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($recentActivities as $activity)
            <div class="bg-white p-6 rounded-2xl shadow-sm border hover:shadow-md transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">{{ $activity['type'] }} (Hari Ini)</p>
                        <h3 class="text-3xl font-bold text-gray-900 mt-2">{{ $activity['count'] }}</h3>
                    </div>
                    <span class="text-5xl opacity-30">{{ $activity['icon'] }}</span>
                </div>
            </div>
        @endforeach
    </div>

    {{-- QUICK ACTIONS --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border">
        <h2 class="text-xl font-semibold mb-6 text-gray-900"> Aksi Cepat</h2>
        <div class="flex flex-wrap gap-3">
            <a href="/admin/students" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-blue-700 font-medium transition-colors">
                 Kelola Siswa
            </a>
            <a href="/admin/mentors" class="bg-purple-600 text-white px-6 py-3 rounded-xl hover:bg-purple-700 font-medium transition-colors">
                 Kelola Mentor
            </a>
            <a href="/admin/scholarships" class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 font-medium transition-colors">
                 Kelola Beasiswa
            </a>
            <a href="/admin/mentor-earnings" class="bg-orange-600 text-white px-6 py-3 rounded-xl hover:bg-orange-700 font-medium transition-colors">
                 Pendapatan Mentor
            </a>
            <a href="/admin/documents" class="bg-indigo-600 text-white px-6 py-3 rounded-xl hover:bg-indigo-700 font-medium transition-colors">
                 Kelola Dokumen
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- TOP SELLING DOCUMENTS --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-900"> Dokumen Terlaris</h2>
                <a href="/admin/documents" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                @forelse($topDocuments as $index => $document)
                    <div class="flex items-center justify-between border-b pb-4 last:border-b-0">
                        <div class="flex items-center gap-3">
                            <span class="bg-blue-100 text-blue-600 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">
                                #{{ $index + 1 }}
                            </span>
                            <div>
                                <p class="font-medium text-gray-900">{{ $document->title }}</p>
                                <p class="text-xs text-gray-500">Rp {{ number_format($document->price) }}</p>
                            </div>
                        </div>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $document->purchases_count }} terjual
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Tidak ada data dokumen</p>
                @endforelse
            </div>
        </div>

        {{-- TOP MENTORS --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-900"> Mentor Terbaik</h2>
                <a href="/admin/mentors" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
            </div>
            <div class="space-y-4">
                @forelse($topMentors as $index => $mentor)
                    <div class="flex items-center justify-between border-b pb-4 last:border-b-0">
                        <div class="flex items-center gap-3">
                            <span class="bg-purple-100 text-purple-600 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">
                                #{{ $index + 1 }}
                            </span>
                            <div>
                                <p class="font-medium text-gray-900">{{ $mentor->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $mentor->specialization ?? 'Mentor' }}</p>
                            </div>
                        </div>
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">
                            {{ $mentor->bookings_count }} booking
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Tidak ada data mentor</p>
                @endforelse
            </div>
        </div>

    </div>

    {{-- RECENT BOOKINGS --}}
    <div class="bg-white p-6 rounded-2xl shadow-sm border">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-gray-900"> Booking Terbaru</h2>
            <a href="/admin/mentor-bookings" class="text-blue-600 text-sm hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Siswa</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Mentor</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Topik</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($recentBookings as $booking)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $booking->student->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $booking->mentor->user->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $booking->topic }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-medium
                                    @if($booking->payment_status === 'PAID')
                                        bg-green-100 text-green-700
                                    @elseif($booking->payment_status === 'PENDING')
                                        bg-yellow-100 text-yellow-700
                                    @else
                                        bg-red-100 text-red-700
                                    @endif
                                ">
                                    @if($booking->payment_status === 'PAID')
                                        ✓
                                    @elseif($booking->payment_status === 'PENDING')
                                        ⏳
                                    @else
                                        ✕
                                    @endif
                                    {{ $booking->payment_status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                {{ $booking->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                Belum ada booking
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
