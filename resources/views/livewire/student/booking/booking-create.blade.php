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

                    <img

                        src="{{ asset('images/booking/qrisdummy.png') }}"

                        class="
                            w-56
                            h-56
                            object-cover
                        "
                    >

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
                            closePaymentModal
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

</div>