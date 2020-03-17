<?php

namespace SlownLS\GmodStore\Collections\Addon;

class Coupons extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetAll" => [ "url" => "addons/%s/coupons", "method" => "GET" ],
        "Create" => [ "url" => "addons/%s/coupons", "method" => "POST" ],
        "GetById" => [ "url" => "addons/%s/coupons/%s", "method" => "GET" ],
        "Update" => [ "url" => "addons/%s/coupons/%s", "method" => "PUT" ],
        "Destroy" => [ "url" => "addons/%s/coupons/%s", "method" => "DELETE" ]
    ];

    /**
     * Fetch all the coupons for an addon
     * 
     * @param int $id
     *
     * @return object
     */
    public function GetAll(int $îd) : object
    {
        $data = $this->Request("GetAll", $îd);

        return $data;
    }

    /**
     * Create an addon coupon
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
     * Fetch an addon's coupon
     *
     * @param int $addonId
     * @param int $couponId
     * 
     * @return object
     */
    public function GetById(int $addonId, int $couponId) : object
    {
        $data = $this->Request("GetById", $addonId, $couponId);

        return $data;
    }

    /**
     * Update an addon's coupon
     *
     * @param integer $addonId
     * @param integer $couponId
     * @param array $params
     * @return void
     */
    public function Update(int $addonId, int $couponId, array $params) : object
    {
        $data = $this->Request("Update", [
            "url" => [$addonId, $couponId],
            "post" => $params
        ]);

        return $data;
    }    

    /**
     * Destroy an addon's coupon
     *
     * @param integer $addonId
     * @param integer $couponId
     * @return void
     */
    public function Destroy(int $addonId, int $couponId) : object
    {
        $data = $this->Request("Destroy", $addonId, $couponId);

        return $data;
    }    
}