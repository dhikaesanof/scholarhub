<article
    class="
        flex
        flex-col
        gap-4
        rounded-lg
        border
        border-scholarhub-border
        bg-white
        p-6
    "
>
    <div class="flex flex-col gap-2">
        <h3
            class="
                text-xl
                font-semibold
                leading-[1.2]
                text-scholarhub-primary
            "
        >
            {{ $document->title }}
        </h3>

        <p
            class="
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
        {{ $formattedPrice }}
    </p>
</article>
