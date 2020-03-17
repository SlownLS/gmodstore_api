<?php

namespace SlownLS\GmodStore;

class Client
{
    /**
     * Token access
     * 
     * @var string
     */
    protected $token;    

    public function __construct(string $token)
    {
        $this->SetToken($token);
    }

    /**
     * Function to get token access
     * 
     * @return string
     */
    protected function GetToken(): string
    {
        return $this->token;
    }

    /**
     * Function to set token access
     * 
     * @param string $secret
     *
     * @return \SlownLS\GmodStore\Client
     */
    public function SetToken(string $token) 
    {
        $this->token = $token;

        return $this;
    }     

    /**
     * Get collection called
     *
     * @param string $name
     * @return class
     */
    public function GetCollection(string $name)
    {
        $collectionName = "\SlownLS\GmodStore\Collections\\$name";

        if( !class_exists($collectionName) ){
            throw new Exception("Collection don't exist");
        }

        $token = $this->GetToken();
        $collection = new $collectionName($token);

        return $collection;
    }
}