<?php

require_once 'services/swapi_service.php';

class WelcomeController {

    const DAY_HOURS = 24;
    const WEEK_HOURS = 24*7;
    const MONTH_HOURS = 24*30;
    const YEAR_HOURS = 24*365;

    public static function index() {
        $title       = gettext("Title");
        $description = gettext("Description");

        include("welcome/index.php");
    }

    public static function calculate() {
        try {
            $distance = $_POST["distance"];

            $data = SwapiService::getStarships();

            foreach ($data as $starship) {

                if($starship->getConsumablesDuration() != "unknown"
                        && $starship->getMegaLightPerHour() != "unknown"){

                    $consumablesDurationInHours = self::getConsumablesDurationInHours($starship->getConsumablesDuration());
                    $resupplyStops = $distance / ($consumablesDurationInHours * (int)$starship->getMegaLightPerHour());

                    $starship->setResupplyStops((int)$resupplyStops);
                }

            }

            echo json_encode($data);

        } catch (Exception $e){
            $message = "\nERROR -- WelcomeController::calculate: " . $e->getMessage() . "\n";
            error_log($message);
            echo "error";
        }
    }

    private static function getConsumablesDurationInHours($consumablesDuration){
        $durationExploded = explode(' ', $consumablesDuration);

        if(strpos($durationExploded[1], 'day') !== false){
            return (int)$durationExploded[0] * self::DAY_HOURS;
        }
        else if(strpos($durationExploded[1], 'week') !== false){
            return (int)$durationExploded[0] * self::WEEK_HOURS;
        }
        else if(strpos($durationExploded[1], 'month') !== false){
            return (int)$durationExploded[0] * self::MONTH_HOURS;
        }
        else if(strpos($durationExploded[1], 'year') !== false){
            return (int)$durationExploded[0] * self::YEAR_HOURS;
        }

    }
}
