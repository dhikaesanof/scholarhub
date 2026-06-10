<div
    class="
        {{ auth()->check() ? '-m-10' : '' }}
        min-h-full
        bg-scholarhub-background
        text-scholarhub-primary
    "
>

    <header
        class="
            flex
            items-center
            justify-between
            gap-4
            px-8
            py-6
        "
    >

        <h1
            class="
                text-[25px]
                font-bold
                leading-[1.2]
            "
        >
            Premium Scholarship Resources
        </h1>

        @auth
            <a
                href="/student/my-documents"
                class="
                    flex
                    h-10
                    items-center
                    justify-center
                    gap-2.5
                    rounded-lg
                    bg-scholarhub-primary
                    py-1.5
                    pl-3
                    pr-4
                    text-[13px]
                    font-semibold
                    leading-[1.2]
                    text-scholarhub-background
                "
            >
                <x-lucide-history class="h-5 w-5" />
                Purchased Documents
            </a>
        @endauth

    </header>

    @if(session()->has('success') || session()->has('error'))

        <div class="px-8 pb-4">

            @if(session()->has('success'))
                <div
                    class="
                        rounded-lg
                        border
                        border-green-200
                        bg-green-50
                        p-4
                        text-sm
                        font-medium
                        text-green-700
                    "
                >
                    {{ session('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div
                    class="
                        rounded-lg
                        border
                        border-red-200
                        bg-red-50
                        p-4
                        text-sm
                        font-medium
                        text-red-700
                    "
                >
                    {{ session('error') }}
                </div>
            @endif

        </div>

    @endif

    <main
        class="
            grid
            grid-cols-1
            gap-6
            px-8
            pb-8
            md:grid-cols-2
            xl:grid-cols-3
        "
    >

        @forelse($documents as $document)

            @php
                $purchaseState = $purchaseStatuses[$document->id] ?? null;
            @endphp

            @component(
                'livewire.student.document.partials.document-card',
                [
                    'document' => $document,
                ]
            )

                @if($purchaseState && $purchaseState['status'] === 'PAID')

                    <a
                        href="{{ route('student.documents.preview', $document->id) }}"
                        class="
                            flex
                            h-9
                            w-full
                            items-center
                            justify-center
                            rounded-lg
                            border
                            border-scholarhub-primary
                            px-6
                            text-[13px]
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-primary
                            transition
                            hover:bg-scholarhub-active/60
                        "
                    >
                        Open Document
                    </a>

                @elseif($purchaseState && $purchaseState['status'] === 'PENDING')

                    <a
                        href="/student/document-payments/{{ $purchaseState['id'] }}"
                        class="
                            flex
                            h-9
                            w-full
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-6
                            text-[13px]
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                        "
                    >
                        Continue Payment
                    </a>

                @else

                    <button
                        type="button"
                        wire:click="purchase({{ $document->id }})"
                        class="
                            flex
                            h-9
                            w-full
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-6
                            text-[13px]
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                        "
                    >
                        Buy Document
                    </button>

                @endif

            @endcomponent

        @empty

            <div
                class="
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-6
                    text-[13px]
                    font-medium
                    leading-[1.2]
                    text-scholarhub-muted
                    md:col-span-2
                    xl:col-span-3
                "
            >
                No documents available.
            </div>

        @endforelse

    </main>

</div>
