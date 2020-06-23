<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/12c685824a.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="content">
    <div class="search-container">
        <form action="{{ route('postApi') }}" method="post">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <ul id="stationList">
    </ul>


    <script>


        const stationList = $('#stationList')

        $(document).ready(function () {
            $(function () {
                var params = {
                    // Request parameters
                };
                $.ajax({
                    url: 'https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/stations?' + $.param(params),
                    beforeSend: function (xhrObj) {
                        // Request headers
                        xhrObj.setRequestHeader('Ocp-Apim-Subscription-Key', '37e6d61918964611b3911fad92a25290');
                    },
                    type: 'GET',
                    data: '{body}',
                })
                    .done(function (data) {
                        $.map(data.payload, function(i) {
                            $('#stationList').append('<li>' + i.namen.lang + '</li>')
                        });
                    })
                    .fail(function () {
                        alert("er is iets fout gegaan");
                    });
            });
        });




    </script>


    <div class="title m-b-md">
        {{--        @foreach($allStations as $allStationDetails)--}}
        {{--            @dd($allStations)--}}
        {{--            <li>{{ $allStationDetails }}</li>--}}
        {{--        @endforeach--}}
    </div>

    {{--    <script>--}}
    {{--        let rest = [{{ }}];--}}
    {{--        let reeee = rest.find(a => a.includes('ber'));--}}
    {{--        console.log(reeee)--}}
    {{--    </script>--}}


</div>


<footer>


    @include('foot')
</footer>
</body>
</html>
