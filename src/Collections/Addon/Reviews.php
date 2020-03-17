<?php

namespace SlownLS\GmodStore\Collections\Addon;

class Reviews extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetAll" => [ "url" => "addons/%s/reviews", "method" => "GET" ],
        "GetById" => [ "url" => "addons/%s/reviews/%s", "method" => "GET" ]
    ];

    /**
     * Fetch all the reviews of an addon
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

    /**
     * Fetch a review of an addon
     *
     * @param int $addonId
     * @param int $reviewId
     * 
     * @return object
     */
    public function GetById(int $addonId, int $reviewId) : object
    {
        $data = $this->Request("GetById", $addonId, $reviewId);

        return $data;
    }
}