<div>

    <h1>
        Assessment History
    </h1>

    @foreach($results as $result)

        <div
            style="
                margin-bottom:20px;
                border:1px solid black;
                padding:10px;
            "
        >

            <h2>

                {{ $result->scholarship->title }}

            </h2>

            <p>

                Score:
                {{ round($result->readiness_percentage) }}%

            </p>

            <p>

                {{ $result->created_at->format('d M Y') }}

            </p>

            <a
                href="/assessment/result/{{ $result->id }}"
            >

                View Result

            </a>

        </div>

    @endforeach

</div>