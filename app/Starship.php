<?php

namespace App;


use Mockery\Exception;

class Starship
{
    const DAY_HOURS = 24;
    const WEEK_HOURS = 24*7;
    const MONTH_HOURS = 24*30;
    const YEAR_HOURS = 24*365;

    public $name;
    public $megaLightPerHour;
    public $consumablesDuration;
    public $resupplyStops;

    public function __construct() {
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return null
     */
    public function getMegaLightPerHour()
    {
        return $this->megaLightPerHour;
    }

    /**
     * @param null $megaLightPerHour
     */
    public function setMegaLightPerHour($megaLightPerHour)
    {
        $this->megaLightPerHour = $megaLightPerHour;
    }

    /**
     * @return null
     */
    public function getConsumablesDuration()
    {
        return $this->consumablesDuration;
    }

    /**
     * @param null $consumablesDuration
     */
    public function setConsumablesDuration($consumablesDuration)
    {
        $this->consumablesDuration = $consumablesDuration;
    }

    /**
     * @return null
     */
    public function getResupplyStops()
    {
        return $this->resupplyStops;
    }

    /**
     * @param null $resupplyStops
     */
    public function setResupplyStops($resupplyStops)
    {
        $this->resupplyStops = $resupplyStops;
    }

    /**s
     * @return int
     */
    public function getConsumablesDurationInHours(){

        try {
            $durationExploded = explode(' ', $this->consumablesDuration);

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
        } catch (Exception $e) {
            return 0;
        }
    }

}