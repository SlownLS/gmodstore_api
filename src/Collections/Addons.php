<?php

namespace SlownLS\GmodStore\Collections;

class Addons extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetAll" => [ "url" => "addons", "method" => "GET" ],
        "GetById" => [ "url" => "addons/%s", "method" => "GET" ]
    ];

    /**
     * Fetch all the addons that you have access to
     *
     * @return object
     */
    public function GetAll() : object
    {
        $data = $this->Request("GetAll");

        return $data;
    }

    /**
     * Fetch a single addon
     *
     * @param int $id
     * 
     * @return object
     */
    public function GetById(int $id) : object
    {
        $data = $this->Request("GetById", $id);

        return $data;
    }
}