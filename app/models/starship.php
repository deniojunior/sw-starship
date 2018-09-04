<?php
class Starship {

    public $name;
    public $megaLightPerHour;
    public $consumablesDuration;
    public $resupplyStops;

    public function __construct($params=null) {
        $this->name = isset($params['name']) ? $params['name'] : null;
        $this->megaLightPerHour = isset($params['megaLightPerHour']) ? $params['megaLightPerHour'] : null;
        $this->consumablesDuration = isset($params['consumablesDuration']) ? $params['consumablesDuration'] : null;
        $this->resupplyStops = isset($params['resupplyStops']) ? $params['resupplyStops'] : null;
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

}
