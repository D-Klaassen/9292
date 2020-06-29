<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/12c685824a.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    {{-- css --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">

    {{-- csrf-token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
