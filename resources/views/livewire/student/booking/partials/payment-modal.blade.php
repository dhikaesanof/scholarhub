{{-- PAYMENT MODAL --}}

    @if($showPaymentModal)

        <div
            class="
                fixed
                inset-0
                bg-black/50
                flex
                items-center
                justify-center
                z-50
            "
        >

            <div
                class="
                    bg-white
                    p-8
                    rounded-lg
                    shadow-lg
                    w-full
                    max-w-md
                "
            >

                <h2
                    class="
                        text-2xl
                        font-bold
                        mb-5
                    "
                >

                    QRIS Payment

                </h2>

                <div
                    class="
                        w-56
                        h-56
                        bg-gray-300
                        mx-auto
                        flex
                        items-center
                        justify-center
                        mb-6
                    "
                >

                    QRIS IMAGE

                </div>

                <div
                    class="
                        flex
                        justify-end
                        gap-4
                    "
                >

                    <button

                        wire:click="
                            $set(
                                'showPaymentModal',
                                false
                            )
                        "

                        class="
                            bg-gray-400
                            text-white
                            px-5
                            py-2
                            rounded
                        "
                    >

                        Exit

                    </button>

                    <button

                        wire:click="
                            confirmPayment
                        "

                        class="
                            bg-green-500
                            text-white
                            px-5
                            py-2
                            rounded
                        "
                    >

                        Already Paid

                    </button>

                </div>

            </div>

        </div>

    @endif