<?php

namespace SlownLS\GmodStore\Collections\Addon;

class Version extends \SlownLS\GmodStore\Collection
{
    /**
     * Endpoints of collection
     *
     * @var array
     */
    public $endPoints = [
        "GetAll" => [ "url" => "addons/%s/versions", "method" => "GET" ],
        "GetById" => [ "url" => "addons/%s/versions/%s", "method" => "GET" ],
        "Download" => [ "url" => "addons/%s/versions/%s/download", "method" => "GET" ]
    ];

    /**
     * Fetch all the versions of an addon
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
     * Fetch a specific version of an addon
     *
     * @param int $addonId
     * @param int $versionId
     * 
     * @return object
     */
    public function GetById(int $addonId, int $versionId) : object
    {
        $data = $this->Request("GetById", $addonId, $versionId);

        return $data;
    }

    /**
     * Generate a download token for a specific version of an addon
     *
     * @param int $addonId
     * @param int $versionId
     * 
     * @return object
     */
    public function Download(int $addonId, int $versionId) : object
    {
        $data = $this->Request("Download", $addonId, $versionId);

        return $data;
    }
}