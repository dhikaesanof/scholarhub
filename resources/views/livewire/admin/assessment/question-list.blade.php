<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <flux:heading size="xl">Assessment Questions - {{ $scholarship->title ?? 'Beasiswa' }}</flux:heading>
            <flux:subheading>Kelola daftar pertanyaan dan opsi jawaban untuk assessment kesiapan mahasiswa.</flux:subheading>
        </div>
    </div>

    <flux:card>
        <flux:heading size="lg" class="mb-4">
            {{ $editingQuestionId ? 'Edit Question' : 'Create Question' }}
        </flux:heading>

        <form wire:submit="save" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-3">
                    <flux:textarea 
                        label="Question" 
                        wire:model="question" 
                        rows="2" 
                        placeholder="Masukkan pertanyaan..." 
                        required 
                    />
                </div>
                <div class="md:col-span-1">
                    <flux:input 
                        type="number"
                        label="Weight" 
                        wire:model="weight" 
                        placeholder="Contoh: 10"
                        required 
                    />
                </div>
            </div>

            <div class="mt-8 border-t border-gray-200 pt-6">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <flux:heading size="md">Answer Options</flux:heading>
                    </div>
                    <flux:button size="sm" variant="secondary" icon="plus" wire:click="addOption">
                        Add Option
                    </flux:button>
                </div>

                <div class="space-y-4">
                    @foreach($options as $index => $option)
                        <div class="flex gap-4 items-start bg-gray-50 p-4 rounded-xl border border-gray-200">
                            <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="md:col-span-2">
                                    <flux:input 
                                        label="Option Text" 
                                        wire:model="options.{{ $index }}.text" 
                                        placeholder="Teks opsi jawaban" 
                                        required 
                                    />
                                </div>
                                
                                <flux:input 
                                    type="number"
                                    label="Score" 
                                    wire:model="options.{{ $index }}.score" 
                                    placeholder="Nilai opsi"
                                    required 
                                />

                                <flux:textarea 
                                    label="Roadmap Suggestion" 
                                    wire:model="options.{{ $index }}.roadmap"
                                    placeholder="Saran roadmap terkait (opsional)..."
                                    rows="1"
                                />
                            </div>
                            
                            <div class="pt-8">
                                <flux:button variant="ghost" color="danger" icon="trash" wire:click="removeOption({{ $index }})" aria-label="Remove Option" />
                            </div>
                        </div>
                    @endforeach

                    @if(count($options) === 0)
                        <div class="text-sm text-gray-500 text-center py-6 bg-gray-50 rounded-xl border border-dashed border-gray-300">
                            Belum ada opsi jawaban. Klik tombol "Add Option" di atas.
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex justify-end space-x-3 mt-8 pt-4 border-t border-gray-100">
                @if($editingQuestionId)
                    <flux:button type="button" variant="ghost" wire:click="$set('editingQuestionId', null)">
                        Cancel Edit
                    </flux:button>
                @endif
                <flux:button type="submit" variant="primary">
                    Save Question
                </flux:button>
            </div>
        </form>
    </flux:card>

    <flux:card>
        <flux:heading size="lg" class="mb-4">Daftar Pertanyaan</flux:heading>
        
        <div class="space-y-4">
            @forelse($questions as $q)
                <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm flex flex-col md:flex-row justify-between md:items-center gap-4">
                    <div class="space-y-2 flex-1">
                        <p class="text-sm text-gray-500 font-medium">Scholarship: {{ $q->scholarship->title }}</p>
                        <p class="font-medium text-gray-900 text-lg">{{ $q->question }}</p>
                        <div class="flex gap-2 text-sm text-gray-600">
                            <flux:badge size="sm" color="blue">Weight: {{ $q->weight }}</flux:badge>
                            <flux:badge size="sm" color="zinc">{{ $q->options ? $q->options->count() : 0 }} Options</flux:badge>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-2 shrink-0">
                        <flux:button size="sm" variant="secondary" icon="pencil" wire:click="edit({{ $q->id }})">
                            Edit
                        </flux:button>
                        <flux:button size="sm" variant="danger" icon="trash" wire:click="delete({{ $q->id }})">
                            Delete
                        </flux:button>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500 border-2 border-dashed border-gray-200 rounded-xl">
                    <flux:icon.book-open-text class="w-8 h-8 mx-auto mb-3 text-gray-400" />
                    <p>Belum ada pertanyaan. Silakan buat pertanyaan baru di atas.</p>
                </div>
            @endforelse
        </div>
    </flux:card>
</div>