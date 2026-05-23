<div>

    <div
        class="
            flex
            items-center
            justify-between
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

                Mentor Earnings

            </h1>

            <p
                class="
                    text-gray-500
                    mt-1
                "
            >

                Monitor mentor transactions and income.

            </p>

        </div>

    </div>

    <div
        class="
            bg-white
            rounded-2xl
            shadow-sm
            border
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

                        Mentor

                    </th>

                    <th class="p-4 text-left">

                        University

                    </th>

                    <th class="p-4 text-left">

                        Paid Sessions

                    </th>

                    <th class="p-4 text-left">

                        Total Income

                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($earnings as $data)

                    <tr
                        class="
                            border-t
                        "
                    >

                        <td class="p-4">

                            {{
                                $data['mentor']
                                    ->user
                                    ->name
                            }}

                        </td>

                        <td class="p-4">

                            {{
                                $data['mentor']
                                    ->university
                            }}

                        </td>

                        <td class="p-4">

                            {{
                                $data['total_sessions']
                            }}

                        </td>

                        <td
                            class="
                                p-4
                                font-semibold
                                text-green-600
                            "
                        >

                            Rp
                            {{

                                number_format(

                                    $data['income'],

                                    0,

                                    ',',

                                    '.'
                                )
                            }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>