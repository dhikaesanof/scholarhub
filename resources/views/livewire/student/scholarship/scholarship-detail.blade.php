<div>

    <h1>{{ $scholarship->title }}</h1>

    <p>
        Provider:
        {{ $scholarship->provider }}
    </p>

    <hr>

    <h2>Description</h2>

    <p>
        {!! nl2br(e($scholarship->description)) !!}
    </p>

    <hr>

    <h2>Benefits</h2>

    <p>
        {!! nl2br(e($scholarship->benefits)) !!}
    </p>

    <hr>

    <h2>Requirements</h2>

    <p>
        {!! nl2br(e($scholarship->requirements)) !!}
    </p>

    <hr>

    <h2>Required Documents</h2>

    <p>
        {!! nl2br(e($scholarship->required_documents)) !!}
    </p>

    <hr>

    <p>
        Minimum GPA:
        {{ $scholarship->minimum_gpa }}
    </p>

    <p>
        Education Level:
        {{ $scholarship->education_level }}
    </p>

    <p>
        Funding Type:
        {{ $scholarship->funding_type }}
    </p>

    <p>
        Deadline:
        {{ $scholarship->deadline }}
    </p>

    <a href="/assessment/{{ $scholarship->id }}">

        Start Assessment

    </a>

</div>