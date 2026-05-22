{{-- REVIEW MODAL --}}

    @if($showReviewModal)

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
                    max-w-2xl
                "
            >

                <h2
                    class="
                        text-2xl
                        font-bold
                        mb-6
                    "
                >

                    Leave Review

                </h2>

                <div class="space-y-5">

                    <div>

                        <label class="block mb-2">

                            Rating

                        </label>

                        <select

                            wire:model="rating"

                            class="
                                w-full
                                border
                                rounded
                                p-2
                            "
                        >

                            <option value="5">
                                5 Stars
                            </option>

                            <option value="4">
                                4 Stars
                            </option>

                            <option value="3">
                                3 Stars
                            </option>

                            <option value="2">
                                2 Stars
                            </option>

                            <option value="1">
                                1 Star
                            </option>

                        </select>

                    </div>

                    <div>

                        <label class="block mb-2">

                            Strengths

                        </label>

                        <div
                            class="
                                flex
                                flex-wrap
                                gap-3
                            "
                        >

                            <label>

                                <input
                                    type="checkbox"
                                    value="Clear Communicator"
                                    wire:model="strengths"
                                >

                                Clear Communicator

                            </label>

                            <label>

                                <input
                                    type="checkbox"
                                    value="Excellent Essay Review"
                                    wire:model="strengths"
                                >

                                Excellent Essay Review

                            </label>

                            <label>

                                <input
                                    type="checkbox"
                                    value="Insightful Strategies"
                                    wire:model="strengths"
                                >

                                Insightful Strategies

                            </label>

                            <label>

                                <input
                                    type="checkbox"
                                    value="Actionable Feedback"
                                    wire:model="strengths"
                                >

                                Actionable Feedback

                            </label>

                        </div>

                    </div>

                    <div>

                        <label class="block mb-2">

                            Review

                        </label>

                        <textarea

                            wire:model="review"

                            rows="5"

                            class="
                                w-full
                                border
                                rounded
                                p-3
                            "
                        ></textarea>

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
                                    'showReviewModal',
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

                        <button

                            wire:click="
                                submitReview
                            "

                            class="
                                bg-green-500
                                text-white
                                px-5
                                py-2
                                rounded
                            "
                        >

                            Submit Review

                        </button>

                    </div>

                </div>

            </div>

        </div>

    @endif

    