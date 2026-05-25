<div>

    <h1
        class="
            text-3xl
            font-bold
            mb-6
        "
    >

        Booking Session

    </h1>

    @if(session()->has('success'))

        <div
            class="
                bg-green-100
                text-green-700
                p-3
                rounded
                mb-5
            "
        >

            {{ session('success') }}

        </div>

    @endif

    @if(session()->has('error'))

        <div
            class="
                bg-red-100
                text-red-700
                p-3
                rounded
                mb-5
            "
        >

            {{ session('error') }}

        </div>

    @endif

    <div
        class="
            bg-white
            p-6
            rounded-lg
            shadow
            space-y-5
        "
    >

        <div>

            <p class="font-semibold">

                Schedule

            </p>

            <p>

                {{ $availability->date }}

                |

                {{ $availability->start_time }}
                -
                {{ $availability->end_time }}

            </p>

        </div>

        <div>

            <label class="block mb-1">

                Mentorship Topic

            </label>

            <input

                type="text"

                wire:model="topic"

                class="
                    w-full
                    border
                    rounded
                    p-2
                "
            >

        </div>

        <div class="flex gap-4">

            <button

                wire:click="createBooking"

                class="
                    bg-blue-500
                    text-white
                    px-5
                    py-2
                    rounded
                "
            >

                Book

            </button>

        </div>

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