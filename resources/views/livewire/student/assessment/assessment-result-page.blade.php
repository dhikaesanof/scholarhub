<div>

    <h1>
        Assessment Result
    </h1>

    <h2>
        {{ $result->scholarship->title }}
    </h2>

    <h3>
        Readiness Score:
        {{ round($result->readiness_percentage) }}%
    </h3>

    <h3>

        {{ $this->getReadinessLabel() }}

    </h3>

    <hr>

    <h2>
        Preparation Roadmap
    </h2>

    <ul>

        @php

            $roadmaps = $result->answers
                ->pluck('option.roadmap_text')
                ->filter()
                ->unique();

        @endphp

        <ul>

            @foreach($roadmaps as $roadmap)

                <li>

                    {{ $roadmap }}

                </li>

            @endforeach

        </ul>
    </ul>

</div>