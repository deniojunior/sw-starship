<?php

require_once 'models/starship.php';

class SwapiService {

    const API_ENDPOINT = "https://swapi.co/api/";

    public static function getStarships() {

        $starships = Array();

        try {
            $apiResponse = file_get_contents(self::API_ENDPOINT . "starships");

            $data = json_decode($apiResponse, true);
            $starships = array_merge($starships, self::extractToObjectArray($data));

            while($data['next']) {
                $apiResponse = file_get_contents($data['next']);
                $data = json_decode($apiResponse, true);
                $starships = array_merge($starships, self::extractToObjectArray($data));
            }

        } catch (Exception $e) {
            error_log('Error -- SwapiService::getStarships: ' . $e->getMessage());
        }

        return $starships;
    }

    private static function extractToObjectArray($data){
        $starships = Array();
        $data['results'];

        foreach($data['results'] as $result){
            $starship = new Starship();

            $starship->setName($result['name']);
            $starship->setMegaLightPerHour($result['MGLT']);
            $starship->setConsumablesDuration($result['consumables']);

            $starships[] = $starship;
        }

        return $starships;
    }

}
