<?php

namespace SlownLS\GmodStore\Collections\Addon;

class Stats extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetAll" => [ "url" => "addons/%s/stats", "method" => "GET" ]
    ];

    /**
     * Fetch all the stats for an addon
     *
     * @param int $addonId
     * 
     * @return object
     */
    public function GetAll(int $addonId) : object
    {
        $data = $this->Request("GetAll", $addonId);

        return $data;
    }
}