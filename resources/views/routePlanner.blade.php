@extends('layouts.master')
@section('content')


    <h2>Dit zijn de geplande routes</h2>


    <div class="d-flex ">

        @foreach($allRoutes as $route)

            <div class="m-20">
                @foreach($route['transfers'] as $allTransfers)
                    <h2>vertrekken vanaf </h2>
                    <p>{{ $allTransfers['origin']['name'] }}</p>
                    @if(array_key_exists('direction', $allTransfers))
                        <h2>trein richting</h2>
                        <p>{{ $allTransfers['direction'] }}</p>
                    @endif
                    <h2>geplande vertrektijd trein: </h2>
                    <p>{{ date('d M Y H:i', strtotime($allTransfers['origin']['plannedDateTime'])) }}</p>
                    <h2>geplande aankomst:</h2>
                    <p>{{ date('d M Y H:i' , strtotime($allTransfers['destination']['plannedDateTime'])) }}</p>
                    <h2>uitstappen op: </h2>
                    <p>{{ $allTransfers['destination']['name'] }}</p>
                @endforeach
                @if(array_key_exists('totalPrice', $route))
                    <h2>prijs van de reis</h2>
                    <p>&#8364;{{ $route['totalPrice'] }}</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection
