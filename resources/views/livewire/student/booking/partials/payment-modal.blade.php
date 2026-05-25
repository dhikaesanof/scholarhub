{{-- PAYMENT MODAL --}}

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