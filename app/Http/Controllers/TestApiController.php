<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestApiController extends Controller
{
    //

    public function index()
    {

//        $response = Http::get('http://test.com');
//
//        var_dump($response);
//        die();



//        $stationInformationJson = stationInformationJson;

        $stationInformationJson = $this->getAllStations();
//
//


//        $arrayInfo = $array.payload;
//
//        $arrayay = [];
//
//        foreach ($arrayInfo as $arrayDetails) {
//            foreach ($arrayDetails['namen'] as $nameLength => $stationName) {
//                if ($nameLength === 'lang') {
//                    array_push($arrayay, $stationName);
//                }
//            }
//        }


//
//
//



//        $arrayay = [];
//
//        foreach ($arrayName['namen'] as $arrays) {
//            array_push($arrayay, $arrays);
//        }

        $stationNamesArray = [];

        foreach ($stationInformationJson as $stationInformationJsonDetails) {
            foreach ($stationInformationJsonDetails['namen'] as $stationInformationNames) {
                if (!in_array($stationInformationNames, $stationNamesArray)) {
                    array_push($stationNamesArray, $stationInformationNames);
                }
            }
        }

        $stationNamesJsonArray = json_encode($stationNamesArray);

//        dd($stationNamesJsonArray);

        return view('welcome')->with(['stationInformationJson' => $stationInformationJson, 'stationNamesJsonArray' => $stationNamesJsonArray]);
    }

    public function getAllStations() {
        $response = Http::asForm()->withHeaders([
            'Ocp-Apim-Subscription-Key' => '37e6d61918964611b3911fad92a25290'
        ])->get('https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/stations');

        $array = json_decode($response->body(), true);

        return $array['payload'];
    }

}
