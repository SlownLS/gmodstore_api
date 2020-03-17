<?php

namespace SlownLS\GmodStore\Collections;

class Users extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetAPIOwner" => [ "url" => "users/me", "method" => "GET" ],
        "GetById" => [ "url" => "users/%s", "method" => "GET" ],
        "GetAddons" => [ "url" => "users/%s/addons", "method" => "GET" ],
        "GetPurchases" => [ "url" => "users/%s/purchases", "method" => "GET" ],
        "GetTeams" => [ "url" => "users/%s/teams", "method" => "GET" ],
        "GetBans" => [ "url" => "users/%s/bans", "method" => "GET" ],
        "GetBadges" => [ "url" => "users/%s/badges", "method" => "GET" ],
    ];

    /**
     * Fetches the current user (API Key Owner)
     *
     * @return object
     */
    public function GetAPIOwner() : object
    {
        $data = $this->Request("GetAPIOwner");

        return $data;
    }

    /**
     * Fetch a single user
     *
     * @param string $userId
     * 
     * @return object
     */
    public function GetById(string $userId) : object
    {
        $data = $this->Request("GetById", $userId);

        return $data;
    }

    /**
     * Fetch all the addons authored / co-authored by a user
     *
     * @param string $userId
     * 
     * @return object
     */
    public function GetAddons(string $userId) : object
    {
        $data = $this->Request("GetAddons", $userId);

        return $data;
    }

    /**
     * Fetch all purchases a user has made
     *
     * @param string $userId
     * 
     * @return object
     */
    public function GetPurchases(string $userId) : object
    {
        $data = $this->Request("GetPurchases", $userId);

        return $data;
    }

    /**
     * Fetch all the teams of a user
     *
     * @param string $userId
     * 
     * @return object
     */
    public function GetTeams(string $userId) : object
    {
        $data = $this->Request("GetTeams", $userId);

        return $data;
    }

    /**
     * Fetch all active bans associated with this user
     *
     * @param string $userId
     * 
     * @return object
     */
    public function GetBans(string $userId) : object
    {
        $data = $this->Request("GetBans", $userId);

        return $data;
    }

    /**
     * Fetch all the badges a user has
     *
     * @param string $userId
     * 
     * @return object
     */
    public function GetBadges(string $userId) : object
    {
        $data = $this->Request("GetBadges", $userId);

        return $data;
    }
}