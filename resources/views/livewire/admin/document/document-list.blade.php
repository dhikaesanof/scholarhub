<div>

    <div
        class="
            flex
            justify-between
            items-center
            mb-8
        "
    >

        <div>

            <h1
                class="
                    text-3xl
                    font-bold
                "
            >

                Documents

            </h1>

            <p
                class="
                    text-gray-500
                    mt-1
                "
            >

                Manage premium PDF documents.

            </p>

        </div>

        <button

            wire:click="
                toggleForm
            "

            class="
                bg-[#1B3764]
                text-white
                px-5
                py-3
                rounded-xl
            "
        >

            {{
                $showForm
                    ? 'Close Form'
                    : 'Upload Document'
            }}

        </button>

    </div>

    @if($showForm)

        <div
            class="
                bg-white
                p-6
                rounded-2xl
                shadow-sm
                border
                mb-8
            "
        >

            <div
                class="
                    grid
                    grid-cols-1
                    gap-4
                "
            >

                <input
                    type="text"
                    wire:model="title"
                    placeholder="Document Title"
                    class="
                        border
                        rounded-xl
                        p-3
                    "
                >

                <textarea

                    wire:model="description"

                    placeholder="Description"

                    class="
                        border
                        rounded-xl
                        p-3
                    "
                ></textarea>

                <input
                    type="number"
                    wire:model="price"
                    placeholder="Price"
                    class="
                        border
                        rounded-xl
                        p-3
                    "
                >

                <p
                    class="
                        text-gray-500
                        mt-1
                    "
                >

                    Upload File PDF

                </p>

                <input
                    type="file"
                    wire:model="pdf_file"
                    accept="application/pdf"
                >

                <p
                    class="
                        text-gray-500
                        mt-1
                    "
                >

                    Upload Preview 

                </p>

                <input
                    type="file"
                    wire:model="thumbnail"
                    accept="image/*"
                >

            </div>

            <button

                wire:click="
                    save
                "

                class="
                    mt-5
                    bg-green-600
                    text-white
                    px-5
                    py-3
                    rounded-xl
                "
            >

                Upload Document

            </button>

        </div>

    @endif

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-3
            gap-6
        "
    >

        @forelse($documents as $document)

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
                                $document->thumbnail

                                ? (

                                    Str::startsWith(

                                        $document->thumbnail,

                                        'http'
                                    )

                                    ? $document->thumbnail

                                    : asset(
                                        'storage/' .
                                        $document->thumbnail
                                    )

                                )

                                : 'https://placehold.co/600x400?text=Document'
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

                    <button

                        wire:click="
                            delete(
                                {{
                                    $document->id
                                }}
                            )
                        "

                        class="
                            mt-4
                            bg-red-600
                            text-white
                            px-4
                            py-2
                            rounded-lg
                        "
                    >

                        Delete

                    </button>

                </div>

            </div>

        @empty

            <p
                class="
                    text-gray-500
                "
            >

                No documents uploaded yet.

            </p>

        @endforelse

    </div>

</div>