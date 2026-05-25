<div>

    <div class="mb-8">

        <h1
            class="
                text-3xl
                font-bold
            "
        >

            My Documents

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Your purchased premium resources.

        </p>

    </div>

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-3
            gap-6
        "
    >

        @forelse($purchases as $purchase)

            <div
                class="
                    bg-white
                    rounded-2xl
                    shadow-sm
                    border
                    overflow-hidden
                "
            >

                @if($purchase->document->thumbnail)

                    <img

                        src="
                            {{
                                asset(

                                    'storage/' .

                                    $purchase->document->thumbnail
                                )
                            }}
                        "

                        class="
                            w-full
                            h-48
                            object-cover
                        "
                    >

                @endif

                <div class="p-5">

                    <h2
                        class="
                            text-xl
                            font-bold
                        "
                    >

                        {{
                            $purchase->document->title
                        }}

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-2
                        "
                    >

                        {{
                            $purchase->document->description
                        }}

                    </p>

                    @if($purchase->payment_status === 'PAID')

                        <a

                            href="
                                {{
                                    route(

                                        'student.documents.preview',

                                        $purchase->document->id
                                    )
                                }}
                            "

                            class="
                                inline-block
                                mt-4
                                bg-green-600
                                text-white
                                px-4
                                py-2
                                rounded-lg
                            "
                        >

                            Open Document

                        </a>

                    @elseif($purchase->payment_status === 'PENDING')

                        <button

                            wire:click="
                                continuePayment(
                                    {{ $purchase->id }}
                                )
                            "

                            class="
                                inline-block
                                mt-4
                                bg-yellow-500
                                text-white
                                px-4
                                py-2
                                rounded-lg
                            "
                        >

                            Continue Payment

                        </button>

                        <button

                            wire:click="
                                cancelPurchase(
                                    {{ $purchase->id }}
                                )
                            "

                            class="
                                inline-block
                                mt-2
                                bg-red-500
                                text-white
                                px-4
                                py-2
                                rounded-lg
                            "
                        >

                            Cancel Buying

                        </button>

                    @endif

                </div>

            </div>

        @empty

            <div
                class="
                    text-gray-500
                "
            >

                No purchased documents yet.

            </div>

        @endforelse

    </div>

    @if($showPaymentModal)

        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">

            <div class="bg-white rounded-2xl p-6 w-full max-w-md">

                <h2 class="text-2xl font-bold mb-4">

                    Complete Payment

                </h2>

                <img
                    src="{{ asset('images/booking/qrisdummy.png') }}"
                    class="w-64 mx-auto"
                >

                <div class="mt-6 flex gap-3">

                    <button
                        wire:click="confirmPayment"
                        class="flex-1 bg-green-600 text-white py-2 rounded-lg"
                    >
                        Already Paid
                    </button>

                    <button
                        wire:click="closePaymentModal"
                        class="flex-1 bg-gray-200 py-2 rounded-lg"
                    >
                        Exit
                    </button>

                </div>

            </div>

        </div>

    @endif

</div>