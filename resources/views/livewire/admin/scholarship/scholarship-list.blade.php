<div class="space-y-6">
    
    {{-- HEADER SECTION --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <flux:heading size="xl">Scholarship List</flux:heading>
            <flux:subheading>Total Scholarships: {{ count($scholarships) }}</flux:subheading>
        </div>
        <flux:button variant="primary" icon="plus" href="/admin/scholarships/create">
            Add Scholarship
        </flux:button>
    </div>

    {{-- LIST SECTION --}}
    <div class="grid grid-cols-1 gap-5">
        @forelse($scholarships as $scholarship)
            <flux:card class="flex flex-col md:flex-row gap-6 items-start md:items-center justify-between transition hover:shadow-md">
                
                {{-- LEFT SIDE: THUMBNAIL & CONTENT --}}
                <div class="flex flex-col sm:flex-row gap-5 flex-1 w-full">
                    
                    {{-- THUMBNAIL --}}
                    <div class="shrink-0">
                        @if($scholarship->thumbnail)
                            <img
                                src="{{ Str::startsWith($scholarship->thumbnail, 'http') ? $scholarship->thumbnail : asset('storage/' . $scholarship->thumbnail) }}"
                                alt="{{ $scholarship->title }}"
                                class="w-full h-40 sm:w-32 sm:h-32 object-cover rounded-xl border border-gray-200"
                            >
                        @else
                            <div class="w-full h-40 sm:w-32 sm:h-32 rounded-xl bg-gray-50 flex flex-col items-center justify-center text-gray-400 border border-gray-200">
                                <flux:icon.photo class="w-8 h-8 mb-1 text-gray-300" />
                                <span class="text-xs font-medium">No Image</span>
                            </div>
                        @endif
                    </div>

                    {{-- CONTENT INFO --}}
                    <div class="flex flex-col justify-center space-y-3 w-full">
                        <div>
                            <flux:heading size="lg" class="!mb-0 line-clamp-1">{{ $scholarship->title }}</flux:heading>
                            <div class="text-sm text-gray-500 font-medium mt-0.5">{{ $scholarship->provider }}</div>
                        </div>

                        {{-- BADGES --}}
                        <div class="flex flex-wrap gap-2">
                            <flux:badge size="sm" color="blue">{{ $scholarship->category }}</flux:badge>
                            <flux:badge size="sm" color="emerald">{{ $scholarship->funding_type }}</flux:badge>
                            
                            <flux:badge size="sm" color="{{ $scholarship->status === 'OPEN' ? 'green' : ($scholarship->status === 'CLOSED' ? 'red' : 'yellow') }}">
                                {{ $scholarship->status }}
                            </flux:badge>
                        </div>

                        {{-- DEADLINE --}}
                        <div class="text-sm text-gray-500 flex items-center gap-1.5 pt-1">
                            <flux:icon.calendar class="w-4 h-4 text-gray-400" />
                            <span>Deadline: <span class="font-medium text-gray-800">{{ $scholarship->deadline }}</span></span>
                        </div>
                    </div>
                </div>

                {{-- RIGHT SIDE: ACTIONS --}}
                <div class="flex flex-row md:flex-col gap-2 shrink-0 w-full md:w-40 mt-2 md:mt-0 border-t md:border-t-0 border-gray-100 pt-4 md:pt-0">
                    <flux:button variant="secondary" size="sm" icon="pencil" href="/admin/scholarships/{{ $scholarship->id }}/edit" class="w-full justify-start">
                        Edit
                    </flux:button>
                    
                    <flux:button variant="secondary" size="sm" icon="clipboard-list" href="/admin/scholarships/{{ $scholarship->id }}/assessments" class="w-full justify-start">
                        Assessments
                    </flux:button>

                    <flux:button variant="danger" size="sm" icon="trash" wire:click="delete({{ $scholarship->id }})" wire:confirm="Yakin ingin menghapus beasiswa ini?" class="w-full justify-start">
                        Delete
                    </flux:button>
                </div>

            </flux:card>

        @empty
            {{-- EMPTY STATE --}}
            <flux:card class="flex flex-col items-center justify-center py-16 text-gray-500 border-dashed border-2">
                <div class="bg-gray-50 p-4 rounded-full mb-4">
                    <flux:icon.inbox class="w-8 h-8 text-gray-400" />
                </div>
                <flux:heading size="lg">Belum Ada Beasiswa</flux:heading>
                <p class="text-sm mt-1 text-center max-w-sm">Daftar beasiswa masih kosong. Tambahkan beasiswa baru agar mahasiswa dapat mulai melihat dan mendaftar.</p>
                <flux:button variant="primary" icon="plus" href="/admin/scholarships/create" class="mt-6">
                    Add New Scholarship
                </flux:button>
            </flux:card>
        @endforelse
    </div>

</div>
