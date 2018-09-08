<?php

namespace App\Http\Controllers;

use App\Exceptions\SWStarshipException;
use App\Starship;
use Illuminate\Http\Request;
use Mockery\Exception;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class CalculatorController extends Controller
{
    const SWAPI_ENDPOINT = 'https://swapi.co/api';

    public function calculate(Request $request)
    {
        $validatedData = $request->validate([
            'distance' => 'required|numeric|min:1',
        ]);

        $distance = $validatedData['distance'];

        $data = Array();
        $request = null;

        try {

            $url = self::SWAPI_ENDPOINT . '/starships';

            do {
                $http = new GuzzleHttpClient();
                $apiRequest = $http->request('GET', $url);

                if ($apiRequest->getStatusCode() < 200 || $apiRequest->getStatusCode() > 299) {
                    throw new SWStarshipException("SWAPI Response not succeeded: " . \GuzzleHttp\json_encode($apiRequest));
                }

                $request = json_decode($apiRequest->getBody()->getContents());

                if ($request->count === 0) {
                    throw new SWStarshipException("SWAPI Response has empty data: " . \GuzzleHttp\json_encode($request));
                }

                foreach ($request->results as $swapiStarship) {

                    if ($swapiStarship->consumables != "unknown"
                        && $swapiStarship->MGLT != "unknown") {

                        $starship = new Starship();
                        $starship->setName($swapiStarship->name);
                        $starship->setMegaLightPerHour($swapiStarship->MGLT);
                        $starship->setConsumablesDuration($swapiStarship->consumables);

                        $consumablesDurationInHours = $starship->getConsumablesDurationInHours();
                        $resupplyStops = (int)($distance / ($consumablesDurationInHours * (int)$swapiStarship->MGLT));

                        $starship->setResupplyStops($resupplyStops);
                        $data[] = $starship;
                    }
                }

                $url = $request->next;

            } while($request->next);
        }
        catch (SWStarshipException $e) {
            error_log("ERROR -- CalculatorController::calculate: " . $e->getMessage() . "\n");
            response()->json(['error' => true, 'message' => "Ocorreu um erro inesperado ao consultar os dados das espaçonaves!"], 500);
        }
        catch (RequestException $e) {
            error_log("ERROR -- CalculatorController::calculate: " . $e->getMessage() . "\n");
            response()->json(['error' => true, 'message' => 'Ocorreu um erro inesperado ao consultar os dados das espaçonaves!'], 500);
        }
        catch (Exception $e) {
            error_log("ERROR -- CalculatorController::calculate: " . $e->getMessage() . "\n");
            response()->json(['error' => true, 'message' => 'Aconteceu um erro inesperado!'], 500);
        }

        return response()->json(['success' => true, 'data' => $data], 200);
    }
}
