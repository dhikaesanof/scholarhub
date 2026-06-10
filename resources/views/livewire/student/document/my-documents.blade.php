<div
    class="
        -m-10
        min-h-full
        bg-scholarhub-background
        text-scholarhub-primary
    "
>

    <header
        class="
            flex
            items-center
            gap-4
            px-8
            py-6
        "
    >

        <a
            href="/documents"
            aria-label="Back to document catalog"
            class="
                flex
                h-12
                w-12
                items-center
                justify-center
                rounded-md
                transition
                hover:bg-scholarhub-border
            "
        >
            <x-lucide-arrow-left class="h-6 w-6" />
        </a>

        <h1
            class="
                text-[25px]
                font-bold
                leading-[1.2]
            "
        >
            Purchased Documents
        </h1>

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

        @forelse($purchases as $purchase)

            @component(
                'livewire.student.document.partials.document-card',
                [
                    'document' => $purchase->document,
                ]
            )

                @if($purchase->payment_status === 'PAID')

                    <a
                        href="{{ route('student.documents.preview', $purchase->document->id) }}"
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

                @else

                    <div
                        class="
                            grid
                            grid-cols-1
                            gap-2
                            sm:grid-cols-2
                        "
                    >
                        <button
                            type="button"
                            wire:click="continuePayment({{ $purchase->id }})"
                            class="
                                flex
                                h-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-scholarhub-primary
                                px-4
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                text-scholarhub-background
                            "
                        >
                            Continue Payment
                        </button>

                        <button
                            type="button"
                            wire:click="cancelPurchase({{ $purchase->id }})"
                            class="
                                flex
                                h-9
                                items-center
                                justify-center
                                rounded-lg
                                bg-red-600
                                px-4
                                text-[13px]
                                font-semibold
                                leading-[1.2]
                                text-white
                            "
                        >
                            Cancel
                        </button>
                    </div>

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
                No purchased documents yet.
            </div>

        @endforelse

    </main>

</div>
