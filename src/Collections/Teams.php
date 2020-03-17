<?php

namespace SlownLS\GmodStore\Collections;

class Teams extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetById" => [ "url" => "teams/%s", "method" => "GET" ],
        "GetUsers" => [ "url" => "teams/%s/users", "method" => "GET" ],
    ];

    /**
     * Fetch a single team
     *
     * @param int $teamId
     * 
     * @return object
     */
    public function GetById(int $teamId) : object
    {
        $data = $this->Request("GetById", $teamId);

        return $data;
    }

    /**
     * Fetch all the users in the given team
     *
     * @param int $teamId
     * 
     * @return object
     */
    public function GetUsers(int $teamId) : object
    {
        $data = $this->Request("GetUsers", $teamId);

        return $data;
    }
}