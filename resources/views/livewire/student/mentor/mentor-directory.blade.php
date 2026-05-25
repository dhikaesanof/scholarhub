<div class="p-8">

    {{-- HEADER --}}

    <div class="mb-8">

        <h1
            class="
                text-4xl
                font-bold
                text-gray-900
            "
        >

            Find Mentors

        </h1>

        <p
            class="
                text-gray-500
                mt-2
            "
        >

            Connect with experienced scholarship awardees and mentors.

        </p>

    </div>

    {{-- MENTOR GRID --}}

    <div
        class="
            grid
            grid-cols-1
            md:grid-cols-2
            xl:grid-cols-3
            gap-6
        "
    >

        @foreach($mentors as $mentor)

            <div
                class="
                    bg-white
                    border
                    rounded-3xl
                    shadow-sm
                    p-6
                    flex
                    flex-col
                    justify-between
                    hover:shadow-md
                    transition
                "
            >

                {{-- TOP CONTENT --}}

                <div>

                    {{-- PROFILE PHOTO --}}

                    <div class="mb-5">

                        @if($mentor->user->profile_photo)

                            <img
                            
                                src="

                                    {{
                                        Str::startsWith(

                                            $mentor->user->profile_photo,

                                            'http'
                                        )

                                        ? $mentor->user->profile_photo

                                        : asset(
                                            'storage/' .
                                            $mentor->user->profile_photo
                                        )
                                    }}

                                "

                                class="
                                    w-24
                                    h-24
                                    object-cover
                                    rounded-2xl
                                    border
                                "
                            >

                        @else

                            <div
                                class="
                                    w-24
                                    h-24
                                    rounded-2xl
                                    bg-gray-200
                                "
                            ></div>

                        @endif

                    </div>

                    {{-- NAME --}}

                    <h2
                        class="
                            text-3xl
                            font-bold
                            text-slate-800
                            leading-tight
                        "
                    >

                        {{ $mentor->user->name }}

                    </h2>

                    {{-- SPECIALIZATION --}}

                    <p
                        class="
                            text-slate-600
                            mt-3
                            text-lg
                        "
                    >

                        {{ $mentor->specialization }}

                    </p>

                    {{-- EMAIL --}}

                    <p
                        class="
                            text-slate-700
                            mt-3
                        "
                    >

                        {{ $mentor->user->email }}

                    </p>

                    {{-- BIO --}}

                    <p
                        class="
                            text-gray-500
                            mt-5
                            leading-7
                            line-clamp-3
                        "
                    >

                        {{ $mentor->bio }}

                    </p>

                </div>

                {{-- BUTTON --}}

                <div
                    class="
                        border-t
                        mt-6
                        pt-5
                    "
                >

                    <a

                        href="
                            /mentors/{{ $mentor->id }}
                        "

                        class="
                            block
                            w-full
                            bg-slate-800
                            hover:bg-slate-900
                            text-white
                            text-center
                            py-3
                            rounded-2xl
                            font-medium
                            transition
                        "
                    >

                        View Mentor

                    </a>

                </div>

            </div>

        @endforeach

    </div>

</div>