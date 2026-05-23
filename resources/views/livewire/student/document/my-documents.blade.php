<div>

    <div class="mb-8">

        <h1
            class="
                text-3xl
                font-bold
            "
        >

            My Documents

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Your purchased premium resources.

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

        @forelse($purchases as $purchase)

            <div
                class="
                    bg-white
                    rounded-2xl
                    shadow-sm
                    border
                    overflow-hidden
                "
            >

                @if($purchase->document->thumbnail)

                    <img

                        src="
                            {{
                                asset(

                                    'storage/' .

                                    $purchase->document->thumbnail
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
                            $purchase->document->title
                        }}

                    </h2>

                    <p
                        class="
                            text-gray-500
                            mt-2
                        "
                    >

                        {{
                            $purchase->document->description
                        }}

                    </p>

                    <a

                        href="
                            {{
                                route(

                                    'student.documents.preview',

                                    $purchase->document->id
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

                </div>

            </div>

        @empty

            <div
                class="
                    text-gray-500
                "
            >

                No purchased documents yet.

            </div>

        @endforelse

    </div>

</div>