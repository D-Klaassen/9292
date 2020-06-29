@extends('layouts.master')
@section('content')

    @if($errors->any())
        <h4>{{$errors->first()}}</h4>
    @endif

    <div class="content">
        <div class="search-container">
            <form autocomplete="off" id="stationList" action="{{ route('DeparturesAndArrivals') }}"
                  method="post">
                @csrf
                <div class="autocomplete">
                    <input id="searchStation" type="text" placeholder="searchStation" name="searchStation">
                </div>
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>


            <script>
                const searchStation = $('#searchStation')
            </script>

            @include('includes.dropDownStationList')

        </div>


        <script>


            {{--            let ditIsStom = {!! $stationInformationJson !!}--}}




            // const searchBar = $('#searchBar');
            // let allStations = []


            {{--            // console.log(searchBar);--}}

            // searchBar.keyup(function (e) {
            //     const searchString = e.target.value.toLowerCase().replace(/[\u0300-\u036f]/g, '');
            //     let filteredStations = allStations.filter(function (station) {
            //         let formatString = station.namen.lang.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, '');
            //         let string = formatString.includes(searchString);
            //         return string
            //     });
            //     displayStations(filteredStations);
            // });



            {{--let stationList = $('#stationList');--}}
            {{--const displayStations = (stations) => {--}}
            {{--    const htmlString = stations--}}
            {{--        .map((station) => {--}}
            {{--             $('#hiddenStationName').text(station.namen.lang)--}}
            {{--            return `--}}
            {{--                    <input type="text" placeholder="Search.." name="searchBar" value="${station.namen.lang}">--}}
            {{--                    <input type="hidden" placeholder="Search.." name="searchBar" value="${station.UICCode}">`--}}

            {{--            return `<li style="width: 100px;">--}}
            {{--                <a href="{{ route('departuresAndArrivals', ['stationName' => 1, 'stationId' => 1]) }}">--}}
            {{--                    <p style="width: 200px;">${station.namen.lang}</p>--}}
            {{--                </a>--}}
            {{--            </li>`;--}}
            {{--        })--}}
            {{--        .join('');--}}
            {{--    stationList.html('<input id="searchBar" type="text" placeholder="Search.." name="searchBar">\n' +--}}
            {{--        '             <button type="submit"><i class="fa fa-search"></i></button>' + htmlString);--}}
            {{--}--}}


            // ajax call om alle stations binnen te halen dit was niet meer nodig er wordt
            // via php http request gedaan
            {{--            $(document).ready(function () {--}}
            {{--                $(function () {--}}
            {{--                    var params = {--}}
            {{--                        // Request parameters--}}
            {{--                    };--}}
            {{--                    $.ajax({--}}
            {{--                        url: 'https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/stations?' + $.param(params),--}}
            {{--                        beforeSend: function (xhrObj) {--}}
            {{--                            // Request headers--}}
            {{--                            xhrObj.setRequestHeader('Ocp-Apim-Subscription-Key', '37e6d61918964611b3911fad92a25290');--}}
            {{--                        },--}}
            {{--                        type: 'GET',--}}
            {{--                        data: '{body}',--}}
            {{--                    })--}}
            {{--                        .done(function (data) {--}}
            {{--                            displayStations(data.payload)--}}
            {{--                            allStations = data.payload;--}}
            {{--                            // $.map(allStations, function(i) {--}}
            {{--                            //     $('#stationList').append('<li>' + i.namen.lang + '</li>')--}}
            {{--                            // });--}}
            {{--                        })--}}
            {{--                        .fail(function () {--}}
            {{--                            alert("er is iets fout gegaan");--}}
            {{--                        });--}}
            {{--                });--}}
            {{--            });--}}
        </script>
    </div>

@endsection

