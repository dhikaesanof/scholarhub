<div>

    <div class="mb-8">

        <h1
            class="
                text-3xl
                font-bold
            "
        >

            Premium Documents

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Buy premium scholarship resources.

        </p>

    </div>

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-3
            gap-6
        "
    >

        @foreach($documents as $document)

            <div
                class="
                    bg-white
                    rounded-2xl
                    shadow-sm
                    border
                    overflow-hidden
                "
            >

                @if($document->thumbnail)

                    <img

                        src="
                            {{
                                asset(
                                    'storage/' .
                                    $document->thumbnail
                                )
                            }}
                        "

                        class="
                            w-full
                            h-48
                            object-cover
                        "
                    >

                @endif

                <div class="p-5">

                    <h2
                        class="
                            text-xl
                            font-bold
                        "
                    >

                        {{
                            $document->title
                        }}

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-2
                        "
                    >

                        {{
                            $document->description
                        }}

                    </p>

                    <p
                        class="
                            mt-4
                            font-semibold
                        "
                    >

                        Rp
                        {{
                            number_format(
                                $document->price
                            )
                        }}

                    </p>

                    @if(

                        in_array(

                            $document->id,

                            $purchasedIds
                        )

                    )

                        <a

                            href="
                                {{
                                    route(

                                        'student.documents.preview',

                                        $document->id
                                    )
                                }}
                            "

                            class="
                                inline-block
                                mt-4
                                bg-green-600
                                text-white
                                px-4
                                py-2
                                rounded-lg
                            "
                        >

                            Open Document

                        </a>

                    @else

                        <button

                            wire:click="
                                purchase(
                                    {{
                                        $document->id
                                    }}
                                )
                            "

                            class="
                                mt-4
                                bg-blue-600
                                text-white
                                px-4
                                py-2
                                rounded-lg
                            "
                        >

                            Buy Now

                        </button>

                    @endif

                </div>

            </div>

        @endforeach

    </div>

</div>