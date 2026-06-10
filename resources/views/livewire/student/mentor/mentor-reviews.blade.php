@auth
    <div
        class="
            -m-10
            min-h-full
            bg-scholarhub-background
            text-scholarhub-primary
        "
    >

        {{-- HEADER --}}

        <header
            class="
                sticky
                z-20
                flex
                items-center
                justify-between
                gap-4
                bg-scholarhub-background
                px-8
                py-5
            "
        >

            <div
                class="
                    flex
                    min-w-0
                    items-center
                    gap-4
                "
            >

                <a
                    href="/mentors/{{ $mentor->id }}"
                    aria-label="Back to mentor detail"
                    class="
                        flex
                        h-12
                        w-12
                        items-center
                        justify-center
                        rounded-md
                        text-scholarhub-primary
                        transition
                        hover:bg-scholarhub-border
                    "
                >

                    <x-lucide-arrow-left class="h-6 w-6" />

                </a>

                <div
                    class="
                        flex
                        min-w-0
                        flex-col
                        gap-1
                    "
                >

                    <h1
                        class="
                            text-xl
                            font-bold
                            leading-[1.2]
                        "
                    >

                        Mentor Review

                    </h1>

                    <p
                        class="
                            truncate
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-muted-light
                        "
                    >

                        {{ $mentor->user->name }}

                    </p>

                </div>

            </div>

            <div
                class="
                    hidden
                    items-center
                    gap-2.5
                    rounded-lg
                    bg-scholarhub-rating-bg
                    py-2
                    pl-3
                    pr-4
                    text-[13px]
                    leading-[1.2]
                    text-scholarhub-rating-text
                    sm:flex
                "
            >

                <x-lucide-star
                    class="
                        h-6
                        w-6
                        fill-scholarhub-rating-icon
                        text-scholarhub-rating-icon
                    "
                />

                <div>

                    <p class="font-medium">

                        Average Rating

                    </p>

                    <p class="font-bold">

                        {{
                            number_format(
                                $averageRating ?? 0,
                                1
                            )
                        }}/5

                    </p>

                </div>

            </div>

        </header>

        <main
            class="
                mx-auto
                flex
                w-full
                max-w-[900px]
                flex-col
                gap-6
                px-8
                pb-[76px]
                pt-2
            "
        >

            {{-- FILTERS --}}

            <section
                class="
                    grid
                    min-h-[72px]
                    grid-cols-1
                    gap-4
                    rounded-lg
                    border
                    border-scholarhub-border
                    bg-white
                    p-[17px]
                    shadow-sm
                    md:grid-cols-3
                "
            >

                <label
                    class="
                        flex
                        items-center
                        gap-2
                        rounded-lg
                        border
                        border-scholarhub-border-strong
                        px-[17px]
                        py-[9px]
                        md:col-span-2
                    "
                >

                    <x-lucide-search class="h-5 w-5 shrink-0" />

                    <input
                        type="search"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Search review keywords"
                        class="
                            w-full
                            border-0
                            bg-transparent
                            p-0
                            text-[13px]
                            font-medium
                            leading-[1.2]
                            text-scholarhub-primary
                            placeholder:text-scholarhub-primary
                            focus:outline-none
                            focus:ring-0
                        "
                    >

                </label>

                <label
                    class="
                        flex
                        items-center
                        rounded-lg
                        border
                        border-scholarhub-border-strong
                        px-[17px]
                        py-[9px]
                    "
                >

                    <select
                        wire:model.live="ratingFilter"
                        class="
                            w-full
                            border-0
                            bg-transparent
                            p-0
                            text-[13px]
                            font-medium
                            leading-[1.2]
                            text-scholarhub-primary
                            focus:outline-none
                            focus:ring-0
                        "
                    >

                        <option value="">
                            All Ratings
                        </option>

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

                </label>

            </section>

            {{-- REVIEWS --}}

            <section
                class="
                    flex
                    flex-col
                    gap-6
                "
            >

                @forelse($reviews as $review)

                    <article
                        class="
                            flex
                            min-h-[200px]
                            flex-col
                            justify-between
                            rounded-lg
                            border
                            border-scholarhub-border
                            bg-white
                            p-6
                        "
                    >

                        <div
                            class="
                                flex
                                gap-1
                            "
                        >

                            @for($star = 1; $star <= 5; $star++)

                                <x-lucide-star
                                    class="
                                        h-6
                                        w-6
                                        text-scholarhub-rating-icon
                                        {{
                                            $star <= $review->rating
                                                ? 'fill-scholarhub-rating-icon'
                                                : ''
                                        }}
                                    "
                                />

                            @endfor

                        </div>

                        <div
                            class="
                                flex
                                flex-col
                                gap-2
                            "
                        >

                            <h2
                                class="
                                    text-xl
                                    font-semibold
                                    leading-[1.2]
                                "
                            >

                                {{ $review->review }}

                            </h2>

                            @if($review->strengths)

                                <div
                                    class="
                                        flex
                                        flex-wrap
                                        gap-2
                                    "
                                >

                                    @foreach($review->strengths as $strength)

                                        <span
                                            class="
                                                rounded-[26px]
                                                bg-scholarhub-active/70
                                                px-3
                                                py-1.5
                                                text-[13px]
                                                font-semibold
                                                leading-[1.2]
                                            "
                                        >

                                            {{ $strength }}

                                        </span>

                                    @endforeach

                                </div>

                            @endif

                        </div>

                        <p
                            class="
                                text-[13px]
                                font-medium
                                leading-[1.2]
                            "
                        >

                            {{ $review->student->user->name }}

                        </p>

                    </article>

                @empty

                    <div
                        class="
                            rounded-lg
                            border
                            border-scholarhub-border
                            bg-white
                            p-6
                            text-base
                            font-semibold
                            leading-[1.2]
                            text-scholarhub-muted-light
                        "
                    >

                        No reviews found.

                    </div>

                @endforelse

            </section>

        </main>

    </div>
@else
    <div
        class="
            min-h-screen
            bg-gray-50
            p-6
            lg:p-10
        "
    >

        <div
            class="
                mx-auto
                max-w-4xl
                rounded-3xl
                border
                bg-white
                p-8
                shadow-sm
            "
        >

            <h1
                class="
                    text-3xl
                    font-bold
                    text-gray-900
                "
            >

                Mentor Reviews

            </h1>

            <p
                class="
                    mt-2
                    text-gray-500
                "
            >

                Login as a student to view the full review experience.

            </p>

            <a
                href="/login"
                class="
                    mt-6
                    inline-flex
                    rounded-2xl
                    bg-slate-800
                    px-6
                    py-3
                    font-medium
                    text-white
                    transition
                    hover:bg-slate-900
                "
            >

                Login

            </a>

        </div>

    </div>
@endauth
