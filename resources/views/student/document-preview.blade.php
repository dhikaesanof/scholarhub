<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="
            width=device-width,
            initial-scale=1.0
        "
    >

    <title>

        {{
            $document->title
        }}

    </title>

</head>

<body
    style="
        margin: 0;
        background: #111;
    "
>

    {{-- WATERMARK --}}

    <div

        style="
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 10px 16px;
            border-radius: 12px;
            font-family: sans-serif;
        "
    >

        Purchased by:

        {{
            auth()->user()->name
        }}

    </div>

    {{-- PDF PREVIEW --}}

    <iframe

        src="
            {{
            
                route(

                    'student.documents.stream',

                    $document->id
                )
            }}
        "

        width="100%"

        height="1000px"

        style="
            border: none;
        "
    >

    </iframe>

</body>

</html>