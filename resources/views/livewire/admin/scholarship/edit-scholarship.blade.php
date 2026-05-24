<div class="p-8">

    <div class="mb-8">

        <h1
            class="
                text-3xl
                font-bold
                text-gray-900
            "
        >

            Edit Scholarship

        </h1>

        <p
            class="
                text-gray-500
                mt-1
            "
        >

            Update scholarship information for students.

        </p>

    </div>

    <form
        wire:submit="update"

        class="
            bg-white
            rounded-2xl
            shadow-sm
            border
            p-8
            space-y-6
        "
    >

        {{-- BASIC INFORMATION --}}

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-2
                gap-6
            "
        >

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Title

                </label>

                <input

                    type="text"

                    wire:model="title"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Provider

                </label>

                <input

                    type="text"

                    wire:model="provider"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

        </div>

        {{-- THUMBNAIL --}}

        <div>

            <label
                class="
                    block
                    mb-2
                    font-medium
                "
            >

                Scholarship Logo

            </label>

            <input
                type="file"
                wire:model="thumbnail"
                accept="image/*"
            >

            @if($thumbnail)

                <img

                    src="
                        {{
                            $thumbnail
                                ->temporaryUrl()
                        }}
                    "

                    class="
                        w-32
                        h-32
                        object-cover
                        rounded-2xl
                        mt-4
                        border
                    "
                >

            @endif

        </div>

        {{-- DESCRIPTION --}}

        <div>

            <label
                class="
                    block
                    mb-2
                    font-medium
                "
            >

                Description

            </label>

            <textarea

                wire:model="description"

                rows="5"

                class="
                    w-full
                    border
                    rounded-xl
                    p-3
                "
            ></textarea>

        </div>

        {{-- BENEFITS & REQUIREMENTS --}}

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-2
                gap-6
            "
        >

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Benefits

                </label>

                <textarea

                    wire:model="benefits"

                    rows="5"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                ></textarea>

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Requirements

                </label>

                <textarea

                    wire:model="requirements"

                    rows="5"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                ></textarea>

            </div>

        </div>

        {{-- DOCUMENTS & GPA --}}

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-2
                gap-6
            "
        >

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Required Documents

                </label>

                <textarea

                    wire:model="required_documents"

                    rows="4"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                ></textarea>

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Minimum GPA

                </label>

                <input

                    type="number"

                    step="0.01"

                    wire:model="minimum_gpa"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

        </div>

        {{-- CATEGORY SECTION --}}

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-3
                gap-6
            "
        >

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Education Level

                </label>

                <select

                    wire:model="education_level"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

                    <option value="">
                        Select
                    </option>

                    <option value="Diploma">
                        Diploma
                    </option>

                    <option value="Bachelor">
                        Bachelor
                    </option>

                    <option value="Master">
                        Master
                    </option>

                </select>

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Category

                </label>

                <input

                    type="text"

                    wire:model="category"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Funding Type

                </label>

                <select

                    wire:model="funding_type"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

                    <option value="">
                        Select
                    </option>

                    <option value="Full Funded">
                        Full Funded
                    </option>

                    <option value="Partial Funded">
                        Partial Funded
                    </option>

                </select>

            </div>

        </div>

        {{-- DATES --}}

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-3
                gap-6
            "
        >

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Registration Open Date

                </label>

                <input

                    type="date"

                    wire:model="registration_open_date"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Deadline

                </label>

                <input

                    type="date"

                    wire:model="deadline"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Announcement Date

                </label>

                <input

                    type="date"

                    wire:model="announcement_date"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

        </div>

        {{-- LINK & STATUS --}}

        <div
            class="
                grid
                grid-cols-1
                md:grid-cols-2
                gap-6
            "
        >

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Registration Link

                </label>

                <input

                    type="url"

                    wire:model="registration_link"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

            </div>

            <div>

                <label
                    class="
                        block
                        mb-2
                        font-medium
                    "
                >

                    Status

                </label>

                <select

                    wire:model="status"

                    class="
                        w-full
                        border
                        rounded-xl
                        p-3
                    "
                >

                    <option value="OPEN">
                        OPEN
                    </option>

                    <option value="CLOSED">
                        CLOSED
                    </option>

                    <option value="COMING_SOON">
                        COMING SOON
                    </option>

                </select>

            </div>

        </div>

        {{-- BUTTON --}}

        <div>

            <button

                type="submit"

                class="
                    bg-blue-600
                    hover:bg-blue-700
                    text-white
                    px-6
                    py-3
                    rounded-xl
                    font-medium
                    transition
                "
            >

                Update Scholarship

            </button>

        </div>

    </form>

</div>