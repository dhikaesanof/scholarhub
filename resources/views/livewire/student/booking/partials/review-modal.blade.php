{{-- REVIEW MODAL --}}

@if($showReviewModal)

    @php
        $strengthOptions = [
            'Clear Communicator',
            'Excellent Essay Review',
            'Insightful Strategies',
            'Actionable Feedback',
        ];
    @endphp

    <div
        class="
            fixed
            inset-0
            z-50
            flex
            items-center
            justify-center
            bg-black/40
            p-4
        "
        role="dialog"
        aria-modal="true"
    >

        <div
            class="
                flex
                w-full
                max-w-[684px]
                flex-col
                gap-4
                overflow-hidden
                rounded-lg
                bg-white
                px-8
                pb-8
                pt-6
                text-scholarhub-primary
                shadow-xl
            "
        >

            <div
                class="
                    flex
                    items-center
                    justify-between
                    gap-4
                "
            >

                <h2
                    class="
                        text-[25px]
                        font-bold
                        leading-[1.2]
                    "
                >
                    How was your mentoring session?
                </h2>

                <button
                    type="button"
                    wire:click="$set('showReviewModal', false)"
                    aria-label="Close review modal"
                    class="
                        flex
                        h-12
                        w-12
                        shrink-0
                        items-center
                        justify-center
                        rounded-md
                        transition
                        hover:bg-scholarhub-border
                    "
                >
                    <x-lucide-x class="h-6 w-6" />
                </button>

            </div>

            <div
                class="
                    flex
                    flex-col
                    gap-3
                "
            >

                <p
                    class="
                        text-xl
                        font-semibold
                        leading-[1.2]
                    "
                >
                    Rating
                </p>

                <div
                    class="
                        flex
                        justify-center
                        gap-4
                    "
                    aria-label="Rating"
                >
                    @for($star = 1; $star <= 5; $star++)
                        <button
                            type="button"
                            wire:click="$set('rating', {{ $star }})"
                            class="
                                text-5xl
                                leading-none
                                text-scholarhub-rating-icon
                                transition
                                hover:scale-105
                            "
                            aria-label="{{ $star }} star rating"
                        >
                            {!! $rating >= $star ? '&#9733;' : '&#9734;' !!}
                        </button>
                    @endfor
                </div>

                @error('rating')
                    <p class="text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div
                class="
                    flex
                    flex-col
                    gap-3
                "
            >

                <p
                    class="
                        text-xl
                        font-semibold
                        leading-[1.2]
                    "
                >
                    Strength
                </p>

                <div
                    class="
                        grid
                        grid-cols-1
                        gap-4
                        sm:grid-cols-2
                    "
                >
                    @foreach($strengthOptions as $strengthOption)
                        <label
                            class="
                                flex
                                h-12
                                cursor-pointer
                                items-center
                                gap-4
                                rounded-lg
                                border
                                border-scholarhub-border-strong/50
                                px-4
                                py-3.5
                                text-base
                                font-medium
                                leading-[1.2]
                                transition
                                has-checked:border-scholarhub-primary
                                has-checked:bg-scholarhub-active/60
                            "
                        >
                            <input
                                type="checkbox"
                                value="{{ $strengthOption }}"
                                wire:model="strengths"
                                class="
                                    h-6
                                    w-6
                                    rounded
                                    border-scholarhub-primary
                                    text-scholarhub-primary
                                "
                            >
                            <span>
                                {{ $strengthOption }}
                            </span>
                        </label>
                    @endforeach
                </div>

            </div>

            <div
                class="
                    flex
                    flex-col
                    gap-3
                "
            >

                <label
                    for="mentor-review"
                    class="
                        text-xl
                        font-semibold
                        leading-[1.2]
                    "
                >
                    Review
                </label>

                <textarea
                    id="mentor-review"
                    wire:model="review"
                    rows="6"
                    placeholder="Write your review here..."
                    class="
                        h-40
                        w-full
                        resize-none
                        rounded-lg
                        border
                        border-scholarhub-border-strong/50
                        bg-white
                        px-4
                        py-3.5
                        text-base
                        font-medium
                        leading-[1.2]
                        text-scholarhub-primary
                        placeholder:text-scholarhub-muted
                        focus:border-scholarhub-primary
                        focus:outline-none
                        focus:ring-2
                        focus:ring-scholarhub-active
                    "
                ></textarea>

                @error('review')
                    <p class="text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            <div
                class="
                    border-t
                    border-scholarhub-border
                    pt-4
                "
            >

                <button
                    type="button"
                    wire:click="submitReview"
                    class="
                        flex
                        h-12
                        w-full
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
                    Send Review
                </button>

            </div>

        </div>

    </div>

@endif
