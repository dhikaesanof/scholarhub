{{-- SESSION MODAL --}}

    @if($showSessionModal)

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

                    Session Information

                </h2>

                <div class="space-y-4">

                    <div>

                        <p class="font-semibold">

                            Mentor

                        </p>

                        <p>

                            {{ $selectedBooking->mentor->full_name }}

                        </p>

                    </div>

                    <div>

                        <p class="font-semibold">

                            Schedule

                        </p>

                        <p>

                            {{ $selectedBooking->availability->date }}

                            |

                            {{ $selectedBooking->availability->start_time }}
                            -
                            {{ $selectedBooking->availability->end_time }}

                        </p>

                    </div>

                    <div>

                        <p class="font-semibold">

                            Telegram

                        </p>

                        <a

                            href="
                                https://{{ $selectedBooking->mentor->telegram_link }}
                            "

                            target="_blank"

                            class="
                                text-blue-500
                            "
                        >

                            Open Telegram

                        </a>

                    </div>

                    <div>

                        <p class="font-semibold">

                            Google Meet

                        </p>

                        <a

                            href="
                                {{ $selectedBooking->mentor->gmeet_link }}
                            "

                            target="_blank"

                            class="
                                text-blue-500
                            "
                        >

                            Open Google Meet

                        </a>

                    </div>

                </div>

                <div
                    class="
                        flex
                        justify-end
                        mt-6
                    "
                >

                    <button

                        wire:click="
                            $set(
                                'showSessionModal',
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

                        Close

                    </button>

                </div>

            </div>

        </div>

    @endif