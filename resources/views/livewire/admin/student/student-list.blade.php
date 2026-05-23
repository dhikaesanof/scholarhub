<div>

    <h1
        class="
            text-3xl
            font-bold
            mb-8
        "
    >

        Manage Students

    </h1>

    <div
        class="
            bg-white
            rounded-2xl
            shadow
            overflow-hidden
        "
    >

        <table class="w-full">

            <thead
                class="
                    bg-gray-100
                "
            >

                <tr>

                    <th class="p-4 text-left">

                        Name

                    </th>

                    <th class="p-4 text-left">

                        Email

                    </th>

                    <th class="p-4 text-left">

                        Role

                    </th>

                    <th class="p-4 text-left">

                        Status

                    </th>

                    <th class="p-4 text-left">

                        Action

                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($students as $student)

                    <tr
                        class="
                            border-t
                        "
                    >

                        <td class="p-4">

                            {{ $student->name }}

                        </td>

                        <td class="p-4">

                            {{ $student->email }}

                        </td>

                        <td class="p-4">

                            {{ $student->role }}

                        </td>

                        <td class="p-4">

                            @if($student->is_blocked)

                                <span
                                    class="
                                        bg-red-100
                                        text-red-700
                                        px-3
                                        py-1
                                        rounded-full
                                        text-sm
                                    "
                                >

                                    Blocked

                                </span>

                            @else

                                <span
                                    class="
                                        bg-green-100
                                        text-green-700
                                        px-3
                                        py-1
                                        rounded-full
                                        text-sm
                                    "
                                >

                                    Active

                                </span>

                            @endif

                        </td>

                        <td class="p-4">

                            <button

                                wire:click="
                                    toggleBlock(
                                        {{ $student->id }}
                                    )
                                "

                                class="
                                    px-4
                                    py-2
                                    rounded-lg
                                    text-white

                                    {{ $student->is_blocked
                                        ? 'bg-green-600'
                                        : 'bg-red-600'
                                    }}
                                "
                            >

                                {{ $student->is_blocked
                                    ? 'Unblock'
                                    : 'Block'
                                }}

                            </button>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>