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
                // dit is voor de dropdownlist
                const searchStation = $('#searchStation')
            </script>

            @include('includes.dropDownStationList')

        </div>
    </div>

@endsection

