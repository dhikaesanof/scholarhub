@php
    $thumbnail = $document->thumbnail
        ? (
            Str::startsWith(
                $document->thumbnail,
                'http'
            )
                ? $document->thumbnail
                : asset('storage/' . $document->thumbnail)
        )
        : null;
@endphp

<article
    class="
        flex
        flex-col
        overflow-hidden
        rounded-lg
        border
        border-scholarhub-border
        bg-white
    "
>

    @if($thumbnail)

        <img
            src="{{ $thumbnail }}"
            alt="{{ $document->title }}"
            class="
                h-40
                w-full
                object-cover
            "
        >

    @else

        <div
            aria-hidden="true"
            class="
                h-40
                w-full
                bg-scholarhub-border-strong
            "
        ></div>

    @endif

    <div
        class="
            flex
            flex-1
            flex-col
            gap-4
            px-4
            py-4
        "
    >

        <div class="flex flex-col gap-2">

            <h2
                class="
                    truncate
                    text-xl
                    font-semibold
                    leading-[1.2]
                    text-scholarhub-primary
                "
            >
                {{ $document->title }}
            </h2>

            <p
                class="
                    line-clamp-2
                    min-h-[32px]
                    text-[13px]
                    font-medium
                    leading-[1.2]
                    text-scholarhub-muted
                "
            >
                {{ $document->description }}
            </p>

        </div>

        <p
            class="
                text-base
                font-semibold
                leading-[1.2]
                text-scholarhub-primary
            "
        >
            Rp{{ number_format($document->price, 0, ',', '.') }}
        </p>

    </div>

    <div
        class="
            border-t
            border-scholarhub-border
            p-4
        "
    >
        {{ $slot }}
    </div>

</article>
