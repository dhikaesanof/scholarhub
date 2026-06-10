@php
    $dateLabel = \Carbon\Carbon::parse($availability->date)->format('jS F Y');
    $timeLabel =
        \Carbon\Carbon::parse($availability->start_time)->format('g.i') .
        '-' .
        \Carbon\Carbon::parse($availability->end_time)->format('g.i A');
@endphp

<section
    class="
        flex
        flex-col
        gap-4
    "
>

    <h2
        class="
            text-xl
            font-bold
            leading-[1.2]
        "
    >

        Session Summary

    </h2>

    <div
        class="
            rounded-lg
            border
            border-scholarhub-border
            bg-white
            p-6
        "
    >

        <dl
            class="
                grid
                grid-cols-1
                gap-x-4
                gap-y-4
                text-base
                font-semibold
                leading-[1.2]
                md:grid-cols-[max-content_minmax(0,1fr)_max-content_minmax(0,1fr)]
            "
        >

            <dt class="text-scholarhub-muted-light">
                Date
            </dt>

            <dd>
                {{ $dateLabel }}
            </dd>

            <dt class="text-scholarhub-muted-light">
                Mentor
            </dt>

            <dd>
                {{ $mentor->user->name }}
            </dd>

            <dt class="text-scholarhub-muted-light">
                Time
            </dt>

            <dd>
                {{ $timeLabel }}
            </dd>

            <dt class="text-scholarhub-muted-light">
                Topic
            </dt>

            <dd>
                {{ $topic }}
            </dd>

        </dl>

    </div>

</section>
