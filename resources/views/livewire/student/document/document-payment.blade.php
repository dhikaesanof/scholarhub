<div
    class="
        -m-10
        min-h-full
        bg-scholarhub-background
        text-scholarhub-primary
    "
>

    @php
        $document = $purchase->document;
        $formattedPrice = 'Rp' . number_format($document->price, 0, ',', '.');
    @endphp

    <header
        class="
            sticky
            z-20
            flex
            items-center
            gap-4
            border-b-2
            border-scholarhub-border
            bg-scholarhub-background/90
            px-8
            py-5
            backdrop-blur
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
                text-xl
                font-bold
                leading-[1.2]
            "
        >
            Payment
        </h1>

    </header>

    <main
        class="
            mx-auto
            flex
            w-full
            max-w-[860px]
            flex-col
            gap-8
            px-6
            py-6
            lg:px-0
        "
    >

        @if($step === 'success')

            <section
                class="
                    flex
                    flex-col
                    gap-6
                    py-4
                "
            >

                <div
                    class="
                        flex
                        items-center
                        gap-4
                    "
                >
                    <div
                        class="
                            flex
                            h-[52px]
                            w-[52px]
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-success-strong
                            text-white
                        "
                    >
                        <x-lucide-circle-check class="h-9 w-9" />
                    </div>

                    <h2
                        class="
                            text-[31px]
                            font-bold
                            leading-[1.2]
                        "
                    >
                        Payment Successful!
                    </h2>
                </div>

                <p
                    class="
                        text-xl
                        font-semibold
                        leading-[1.2]
                    "
                >
                    Your payment has been received.<br>
                    Now, you can access and download the full document anytime.
                </p>

            </section>

            <section
                class="
                    flex
                    flex-col
                    gap-4
                "
            >

                <h2 class="text-[25px] font-bold leading-[1.2]">
                    Checkout Summary
                </h2>

                @include(
                    'livewire.student.document.partials.payment-summary-card',
                    [
                        'document' => $document,
                        'formattedPrice' => $formattedPrice,
                    ]
                )

                <div
                    class="
                        flex
                        items-center
                        justify-between
                        text-base
                        font-semibold
                        leading-[1.2]
                    "
                >
                    <span class="text-scholarhub-muted-light">
                        Paid Amount
                    </span>

                    <span
                        class="
                            font-bold
                            text-scholarhub-success
                        "
                    >
                        {{ $formattedPrice }}
                    </span>
                </div>

            </section>

            <section
                class="
                    border-t
                    border-scholarhub-border
                    pt-4
                "
            >
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <a
                        href="/documents"
                        class="
                            flex
                            h-12
                            items-center
                            justify-center
                            rounded-lg
                            border
                            border-scholarhub-primary
                            px-6
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-primary
                        "
                    >
                        Back to Document Catalog
                    </a>

                    <a
                        href="{{ route('student.documents.preview', $document->id) }}"
                        class="
                            flex
                            h-12
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-6
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                        "
                    >
                        Open Document
                    </a>
                </div>
            </section>

        @else

            <section
                class="
                    flex
                    flex-col
                    items-center
                    gap-6
                "
            >

                <p
                    class="
                        w-full
                        text-base
                        font-semibold
                        leading-[1.2]
                    "
                >
                    Please scan the QRIS code using your preferred mobile banking or e-wallet app. Once the payment is completed, click “Already Paid” to confirm your transaction.
                </p>

                <img
                    src="{{ asset('images/booking/qrisdummy.png') }}"
                    alt="QRIS payment code"
                    class="
                        h-[400px]
                        w-[400px]
                        max-w-full
                        object-contain
                    "
                >

                <div
                    class="
                        flex
                        w-full
                        items-center
                        justify-between
                        text-xl
                        font-semibold
                        leading-[1.2]
                    "
                >
                    <span class="text-scholarhub-muted-light">
                        Total Payment
                    </span>

                    <span
                        class="
                            font-bold
                            text-scholarhub-success
                        "
                    >
                        {{ $formattedPrice }}
                    </span>
                </div>

                <div
                    class="
                        grid
                        w-full
                        grid-cols-1
                        gap-4
                        border-t
                        border-scholarhub-border
                        pt-4
                        md:grid-cols-2
                    "
                >
                    <button
                        type="button"
                        wire:click="cancelPayment"
                        class="
                            flex
                            h-12
                            items-center
                            justify-center
                            rounded-lg
                            border
                            border-scholarhub-primary
                            px-6
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-primary
                        "
                    >
                        Cancel Payment
                    </button>

                    <button
                        type="button"
                        wire:click="confirmPayment"
                        class="
                            flex
                            h-12
                            items-center
                            justify-center
                            rounded-lg
                            bg-scholarhub-primary
                            px-6
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-background
                        "
                    >
                        Already Paid
                    </button>
                </div>

            </section>

            <section
                class="
                    flex
                    flex-col
                    gap-4
                "
            >

                <h2 class="text-xl font-bold leading-[1.2]">
                    Item Summary
                </h2>

                @include(
                    'livewire.student.document.partials.payment-summary-card',
                    [
                        'document' => $document,
                        'formattedPrice' => $formattedPrice,
                    ]
                )

            </section>

        @endif

    </main>

</div>
