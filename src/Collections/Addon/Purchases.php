<?php

namespace SlownLS\GmodStore\Collections\Addon;

class Purchases extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetAll" => [ "url" => "addons/%s/purchases", "method" => "GET" ],
        "Create" => [ "url" => "addons/%s/purchases", "method" => "POST" ],
        "GetById" => [ "url" => "addons/%s/purchases/%s", "method" => "GET" ],
        "Update" => [ "url" => "addons/%s/purchases/%s", "method" => "PUT" ],
    ];

    /**
     * Fetch all purchases of an addon
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
     * Create a purchase for an addon
     *
     * @param integer $addonId
     * @param array $params
     * @return void
     */
    public function Create(int $addonId, array $params) : object
    {
        $data = $this->Request("Create", [
            "url" => [$addonId],
            "post" => $params
        ]);

        return $data;
    }    

    /**
     * Get a purchase of an addon by user
     *
     * @param int $addonId
     * @param string $userId
     * 
     * @return object
     */
    public function GetById(int $addonId, string $userId) : object
    {
        $data = $this->Request("GetById", $addonId, $userId);

        return $data;
    }    

    /**
     * Update a purchase for an addon
     *
     * @param int $addonId
     * @param string $userId
     * 
     * @return object
     */
    public function Revoke(int $addonId, string $userId) : object
    {
        $data = $this->Request("Update", [
            "url" => [$addonId, $userId],
            "post" => [ "revoked" => true ]
        ]);

        return $data;
    }    
}