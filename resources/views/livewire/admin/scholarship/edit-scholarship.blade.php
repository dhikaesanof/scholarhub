<div class="space-y-8">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-semibold text-slate-950">Edit Scholarship</h1>
            <p class="text-slate-600 mt-1">Update semua detail beasiswa dan simpan perubahan.</p>
        </div>
        <a href="/admin/scholarships" class="inline-flex items-center rounded-3xl bg-slate-100 px-5 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">Discard</a>
    </div>

    <form wire:submit.prevent="update" class="space-y-8 rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
        <section class="space-y-5">
            <h2 class="text-xl font-semibold text-slate-900">Basic Information</h2>
            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Name</label>
                    <input type="text" wire:model="title" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="Scholarship Title" />
                    @error('title') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Provider</label>
                    <input type="text" wire:model="provider" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="Provider Name" />
                    @error('provider') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Category</label>
                    <input type="text" wire:model="category" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="e.g. Government, Private" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Education Level</label>
                    <select wire:model="education_level" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none">
                        <option value="">Select</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelor">Bachelor</option>
                        <option value="Master">Master</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Funding Type</label>
                    <select wire:model="funding_type" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none">
                        <option value="">Select</option>
                        <option value="Full Funded">Full Funded</option>
                        <option value="Partial Funded">Partial Funded</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Status</label>
                    <select wire:model="status" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none">
                        <option value="OPEN">OPEN</option>
                        <option value="CLOSED">CLOSED</option>
                        <option value="COMING_SOON">COMING SOON</option>
                    </select>
                </div>
            </div>
        </section>

        <section class="space-y-5">
            <h2 class="text-xl font-semibold text-slate-900">Scholarship Details</h2>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Description</label>
                    <textarea wire:model="description" rows="4" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="Scholarship description..."></textarea>
                    @error('description') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Benefits</label>
                        <textarea wire:model="benefits" rows="4" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="What students will gain..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Requirements</label>
                        <textarea wire:model="requirements" rows="4" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="Application requirements..."></textarea>
                    </div>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Required Documents</label>
                        <textarea wire:model="required_documents" rows="4" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="Document list..."></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700">Minimum GPA</label>
                        <input type="number" step="0.01" wire:model="minimum_gpa" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="e.g. 3.50" />
                    </div>
                </div>
            </div>
        </section>

        <section class="space-y-5">
            <h2 class="text-xl font-semibold text-slate-900">Important Dates</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div>
                    <label class="block text-sm font-medium text-slate-700">Open Registration Date</label>
                    <input type="date" wire:model="registration_open_date" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Close Registration Date</label>
                    <input type="date" wire:model="deadline" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700">Announcement Date</label>
                    <input type="date" wire:model="announcement_date" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" />
                </div>
            </div>
        </section>

        <section class="space-y-5">
            <h2 class="text-xl font-semibold text-slate-900">External Links</h2>
            <div>
                <label class="block text-sm font-medium text-slate-700">Registration Link</label>
                <input type="url" wire:model="registration_link" class="mt-2 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-slate-900 shadow-sm focus:border-slate-900 focus:outline-none" placeholder="https://" />
            </div>
        </section>

        <section class="space-y-5">
            <h2 class="text-xl font-semibold text-slate-900">Upload Logo</h2>
            <div class="rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-6 text-center">
                <input type="file" wire:model="thumbnail" accept="image/*" class="mx-auto block" />
                @if($thumbnail)
                    <img src="{{ $thumbnail->temporaryUrl() }}" alt="Scholarship Preview" class="mx-auto mt-4 h-32 w-32 rounded-3xl object-cover" />
                @elseif($scholarship->thumbnail)
                    <img src="{{ Str::startsWith($scholarship->thumbnail, 'http') ? $scholarship->thumbnail : asset('storage/' . $scholarship->thumbnail) }}" alt="Scholarship Preview" class="mx-auto mt-4 h-32 w-32 rounded-3xl object-cover" />
                @endif
            </div>
        </section>

        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between">
            <div>
                <button type="button" wire:click="deleteScholarship" class="rounded-3xl bg-rose-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-rose-700">Delete Scholarship</button>
            </div>
            <div class="flex gap-4 flex-wrap">
                <a href="/admin/scholarships" class="inline-flex items-center justify-center rounded-3xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-900 transition hover:bg-slate-50">Cancel</a>
                <button type="submit" class="rounded-3xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">Save Edit</button>
            </div>
        </div>
    </form>
</div>