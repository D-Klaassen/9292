@extends('layouts.master')
@section('content')


    <h2>hier komt de geplande route of dat je de route kan plannen weet ik nog niet</h2>


    <div class="d-flex ">
        @foreach($allRoutes as $route)
            <div class="m-20">
                @foreach($route['transfers'] as $allTransfers)
                <h2>vertrekken vanaf</h2>
                <p>{{ $allTransfers['origin']['name'] }}</p>
                    <h2>trein richting: </h2>
                    <p>{{ $allTransfers['destination']['name'] }}</p>
                    <h2>geplande vertrektijd trein: </h2>
                    <p>{{ date('d M Y H:i', strtotime($allTransfers['origin']['plannedDateTime'])) }}</p>
                    <h2>geplande aankomst:</h2>
                    <p>{{ date('d M Y H:i' , strtotime($allTransfers['destination']['plannedDateTime'])) }}</p>
                @endforeach
                <h2>prijs van de reis</h2>
                <p>&#8364;{{ $route['totalPrice'] }}</p>

            </div>
        @endforeach

    </div>

    <script>

        // ajax call om alle stations binnen te halen dit was niet meer nodig er wordt
        // via php http request gedaan
        {{--            $(document).ready(function () {--}}
        {{--                $(function () {--}}
        {{--                    var params = {--}}
        {{--                        'originUicCode': {{ $fromStationCode }},--}}
        {{--                        'destinationUicCode': {{ $toStationCode }}--}}
        {{--                        // Request parameters--}}
        {{--                    };--}}
        {{--                    $.ajax({--}}
        {{--                        url: 'https://gateway.apiportal.ns.nl/reisinformatie-api/api/v3/trips?' + $.param(params),--}}
        {{--                        beforeSend: function (xhrObj) {--}}
        {{--                            // Request headers--}}
        {{--                            xhrObj.setRequestHeader('Ocp-Apim-Subscription-Key', '37e6d61918964611b3911fad92a25290');--}}
        {{--                        },--}}
        {{--                        type: 'GET',--}}
        {{--                        data: '{body}',--}}
        {{--                    })--}}
        {{--                        .done(function (data) {--}}

        {{--                            console.log(data)--}}
        {{--                            console.log(data.trips)--}}
        {{--                            console.log(data.trips[4].legs[0].destination.name)--}}
        {{--                            console.log(data.trips[4].productFare.priceInCents)--}}
        {{--                        })--}}
        {{--                        .fail(function () {--}}
        {{--                            alert("er is iets fout gegaan");--}}
        {{--                        });--}}
        {{--                });--}}
        {{--            });--}}


    </script>

@endsection
