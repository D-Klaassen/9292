@extends('layouts.master')
@section('content')

    <div class="content">
        <h2>hier komen de arrivals en departures</h2>
        <h2>dit is je station: {{ $stationName }}</h2>
    </div>

    <div class="d-flex">
        <div>
            <h2>dit zijn de treinen die aankomen</h2>
            <table id="arrivalList">
                <tr>
                    <th>afkomst</th>
                    <th>gepland spoor</th>
                    <th>trein category</th>
                </tr>
            </table>
        </div>
        <div>

            <h2>dit zijn de treinen die vertrekken</h2>
            <table id="departureList">
                <tr>
                    <th>richting</th>
                    <th>gepland spoor</th>
                    <th>trein category</th>
                </tr>
            </table>
        </div>
        <div>
            <h2>plan een route</h2>
            <form autocomplete="off" class="to-station-form" action="{{ route('planRoute') }}"
                  method="post">
                @csrf
                <div class="autocomplete">
                    <input id="searchStation" type="text" placeholder="vul hier het station in waar u naartoe wilt" name="searchStation">
                </div>
                <input type="hidden" value="{{ $stationUICCode }}" name="fromStationId" id="fromStationId">

                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>


    <script>

        const arrivalList = $('#arrivalList')
        const departureList = $('#departureList')

        $(document).ready(function () {
            $(function () {
                var params = {
                    "uicCode": "{{ $stationUICCode }}"
                    // Request parameters
                };
                $.ajax({
                    url: 'https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/arrivals?' + $.param(params),
                    beforeSend: function (xhrObj) {
                        // Request headers
                        xhrObj.setRequestHeader('Ocp-Apim-Subscription-Key', '37e6d61918964611b3911fad92a25290');
                    },
                    type: 'GET',
                    data: '{body}',
                })
                    .done(function (data) {
                        let allArrivals = data.payload.arrivals;
                        displayArrivals(allArrivals)
                    })
                    .fail(function () {
                        alert("er is iets fout gegaan");
                    });
            });
        });

        const displayArrivals = (arrivals) => {
            const htmlString = arrivals
                .map((arrival) => {
                    return `
                    <tr>
                        <td><p style="width: 200px;">${arrival.origin}</p></td>
                        <td><p style="width: 200px;">${arrival.plannedTrack}</p></td>
                        <td><p style="width: 200px;">${arrival.product.longCategoryName}</p></td>
                    </tr>
`
                })
                .join('');
            arrivalList.append(htmlString);
        };

        $(document).ready(function () {
            $(function () {
                var params = {
                    "uicCode": "{{ $stationUICCode }}"
                    // Request parameters
                };
                $.ajax({
                    url: 'https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/departures?' + $.param(params),
                    beforeSend: function (xhrObj) {
                        // Request headers
                        xhrObj.setRequestHeader('Ocp-Apim-Subscription-Key', '37e6d61918964611b3911fad92a25290');
                    },
                    type: 'GET',
                    data: '{body}',
                })
                    .done(function (data) {
                        let allDepartures = data.payload.departures;
                        displayDepartures(allDepartures)
                        // $.map(allArrivals, function(i) {
                        //     console.log(i.name)
                        //     $('#arrivalList').append('<li>' + i + '</li>')
                        // });
                    })
                    .fail(function () {
                        alert("er is iets fout gegaan");
                    });
            });
        });

        const displayDepartures = (departures) => {
            const htmlString = departures
                .map((departure) => {
                    return `
                    <tr>
                        <td><p style="width: 200px;">${departure.direction}</p></td>
                        <td><p style="width: 200px;">${departure.plannedTrack}</p></td>
                        <td><p style="width: 200px;">${departure.product.longCategoryName}</p></td>
                    </tr>
`
                })
                .join('');
            departureList.append(htmlString);
        };
    </script>

    <script>
        const searchStation = $('#searchStation')
    </script>
    @include('includes.dropDownStationList')
@endsection
