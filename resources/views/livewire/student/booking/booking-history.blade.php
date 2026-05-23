<div>

    <h1
        class="
            text-3xl
            font-bold
            mb-6
        "
    >

        Booking History

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

    <div class="space-y-5">

        @forelse($bookings as $booking)

            <div
                class="
                    bg-white
                    p-6
                    rounded-lg
                    shadow
                "
            >

                <h2
                    class="
                        text-xl
                        font-bold
                    "
                >

                    {{ $booking->mentor->user->name }}

                </h2>

                <p class="mt-2">

                    Topic:
                    {{ $booking->topic }}

                </p>

                <p class="mt-2">

                    {{ $booking->availability->date }}

                    |

                    {{ $booking->availability->start_time }}
                    -
                    {{ $booking->availability->end_time }}

                </p>

                <div class="mt-4">

                    @if(
                        $booking->payment_status
                        === 'PAID'
                    )

                        <span
                            class="
                                bg-green-100
                                text-green-700
                                px-3
                                py-1
                                rounded-full
                                text-sm
                            "
                        >

                            Paid

                        </span>

                    @elseif(
                        $booking->payment_status
                        === 'EXPIRED'
                    )

                        <span
                            class="
                                bg-red-100
                                text-red-700
                                px-3
                                py-1
                                rounded-full
                                text-sm
                            "
                        >

                            Expired

                        </span>

                    @endif

                </div>

                @if(
                    $booking->payment_status
                    === 'PENDING'
                )

                    <div
                        class="
                            flex
                            gap-4
                            mt-5
                        "
                    >

                        <button

                            wire:click="
                                continuePayment(
                                    {{ $booking->id }}
                                )
                            "

                            class="
                                bg-blue-500
                                text-white
                                px-5
                                py-2
                                rounded
                            "
                        >

                            Continue Payment

                        </button>

                        <button

                            wire:click="
                                cancelBooking(
                                    {{ $booking->id }}
                                )
                            "

                            class="
                                bg-red-500
                                text-white
                                px-5
                                py-2
                                rounded
                            "
                        >

                            Cancel Booking

                        </button>

                    </div>

                    
                @endif

                @if(
                    $booking->payment_status
                    === 'PAID'
                )

                    <div class="mt-5">

                        <button

                            wire:click="
                                viewSession(
                                    {{ $booking->id }}
                                )
                            "

                            class="
                                bg-blue-500
                                text-white
                                px-5
                                py-2
                                rounded
                            "
                        >

                            View Session

                        </button>

                        @php

                            $sessionEnd = \Carbon\Carbon::createFromFormat(

                                'Y-m-d H:i:s',

                                $booking->availability->date .
                                ' ' .
                                $booking->availability->end_time

                            );

                            $sessionEnded =
                                now()->greaterThan($sessionEnd);

                        @endphp

                        @php

                            $alreadyReviewed =

                                \App\Models\MentorReview::where(

                                    'mentor_booking_id',

                                    $booking->id

                                )->exists();

                        @endphp

                        @if(
                            $booking->payment_status === 'PAID'
                            &&
                            $sessionEnded
                            &&
                            !$alreadyReviewed
                        )

                            <button

                                wire:click="
                                    leaveReview(
                                        {{ $booking->id }}
                                    )
                                "

                                class="
                                    bg-yellow-500
                                    text-white
                                    px-5
                                    py-2
                                    rounded
                                    ml-4
                                "
                            >

                                Leave Review

                            </button>

                        @elseif($alreadyReviewed)

                            <span
                                class="
                                    bg-gray-200
                                    text-gray-700
                                    px-4
                                    py-2
                                    rounded
                                    text-sm
                                "
                            >

                                Reviewed

                            </span>

                        @endif

                    </div>

                @endif

            </div>

        @empty

            <div
                class="
                    bg-white
                    p-6
                    rounded-lg
                    shadow
                "
            >

                No bookings yet.

            </div>

        @endforelse

    </div>

    @include(
    'livewire.student.booking.partials.payment-modal'
    )

    @include(
        'livewire.student.booking.partials.session-modal'
    )

    @include(
        'livewire.student.booking.partials.review-modal'
    )

</div>