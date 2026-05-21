<div>

    <div
        class="
            bg-white
            p-6
            rounded-lg
            shadow
            mb-8
        "
    >

        <h1
            class="
                text-3xl
                font-bold
            "
        >

            {{ $mentor->full_name }}

        </h1>

        <p
            class="
                text-blue-500
                mt-2
            "
        >

            {{ $mentor->specialization }}

        </p>

        <p
            class="
                text-gray-600
                mt-4
            "
        >

            {{ $mentor->bio }}

        </p>

        <div class="mt-5 space-y-2">

            @if($mentor->telegram_link)

                <p>

                    Telegram:
                    {{ $mentor->telegram_link }}

                </p>

            @endif

            @if($mentor->instagram_username)

                <p>

                    Instagram:
                    {{ $mentor->instagram_username }}

                </p>

            @endif

        </div>

    </div>

    <div>

        <h2
            class="
                text-2xl
                font-bold
                mb-5
            "
        >

            Available Slots

        </h2>

        <div class="space-y-4">

            @forelse($availabilities as $slot)

                <div
                    class="
                        bg-white
                        p-5
                        rounded-lg
                        shadow
                        flex
                        justify-between
                        items-center
                    "
                >

                    <div>

                        <p class="font-semibold">

                            {{ $slot->date }}

                        </p>

                        <p>

                            {{ $slot->start_time }}
                            -
                            {{ $slot->end_time }}

                        </p>

                    </div>

                    <button
                        class="
                            bg-blue-500
                            text-white
                            px-5
                            py-2
                            rounded
                        "
                    >

                        Book Session

                    </button>

                </div>

            @empty

                <div
                    class="
                        bg-white
                        p-5
                        rounded-lg
                        shadow
                    "
                >

                    No available slots yet.

                </div>

            @endforelse

        </div>

    </div>

</div>