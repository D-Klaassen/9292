<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;


class DepartureAndArrivalController extends Controller
{
    //
    public function index() {

            $stationName = $_POST['searchStation'];
            if ($this->getUICCode($_POST['searchStation']) !== 1) {
                $UICCode = $this->getUICCode($_POST['searchStation']);
            } else {
                return Redirect::back()->withErrors('Je moet een bestaand station invullen');
            }

            $stationInformationJson = $this->getStationInformation();

        return view('departures-and-arrivals')->with(['stationName' => $stationName, 'stationUICCode' => $UICCode, 'stationInformationJson' => $stationInformationJson]);
    }

    public function planRoute() {

        if (array_key_exists('searchStation', $_POST)) {
            if ($this->getUICCode($_POST['searchStation']) !== 1) {

                $UICCode = $this->getUICCode($_POST['searchStation']);

                $allRoutes = $this->RoutePlanner($_POST['fromStationId'], $UICCode);

                $oneRoute = array();


                foreach($allRoutes as $route) {
                    $stringRidePrice = substr_replace($route['productFare']['priceInCents'], ',', -2, 0);
                array_push($oneRoute, [
                    'departFrom' => $route['legs'][0]['origin']['name'],
                    'transfers' => $route['legs'],
                    'totalPrice' => $stringRidePrice,
                ]);
                }


                foreach($oneRoute as $oneRouteDetails) {
                    foreach ($oneRouteDetails['transfers'] as $transferDetails) {

                    }
                }

//                dd($transferDetails);
//
//
//                dd($oneRoute);
//                dd($allRoutes);





//                foreach ($logika as $route) {
//                    dd($route);
//                }
//
//
//                dd($logika);


                return view('routePlanner')->with(['fromStationCode' => $_POST['fromStationId'], 'toStationCode' => $UICCode, 'allRoutes' => $oneRoute], compact('newDt'));

            } else {
                dd('paste bolognaise blyat');
            }
        } else {
            dd($_GET, $_POST, 'reeee');
        }

    }

    public function getUICCode($stationName) {

        $TestApiController = new TestApiController();
        $stationInformationJson = $TestApiController->getAllStations();

        $stationDontExists = 1;
        foreach ($stationInformationJson as $stationInformationJsonDetails) {
            foreach($stationInformationJsonDetails['namen'] as $StationName) {
                $lowerStationName = strtolower($StationName);
                $lowerPostStationName = strtolower($_POST['searchStation']);
                if ($lowerPostStationName === $lowerStationName) {
                    return $stationInformationJsonDetails['UICCode'];
                }
            }
        }

        return $stationDontExists;
    }

    public function getStationInformation() {
        $TestApiController = new TestApiController();
        return $TestApiController->getAllStations();
    }

    public function RoutePlanner($departFrom, $arriveAt) {

        $response = Http::asForm()->withHeaders([
            'Ocp-Apim-Subscription-Key' => '37e6d61918964611b3911fad92a25290'
        ])->get('https://gateway.apiportal.ns.nl/reisinformatie-api/api/v3/trips', [
            'originUicCode' => $departFrom,
            'destinationUicCode' => $arriveAt,
        ]);

        $array = json_decode($response->body(), true);

        return $array['trips'];
    }

    public function stationExistCheck() {

    }
}
