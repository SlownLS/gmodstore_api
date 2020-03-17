<?php

namespace SlownLS\GmodStore\Traits;

use GuzzleHttp\Client as GuzzleClient;

trait Util
{
    /**
     * Guzzle Client
     *
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Get guzzle client
     *
     * @return \GuzzleHttp\Client
     */
    protected function Client()
    {
        if( \is_null($this->client) ){
            $this->client = new GuzzleClient([
                "http_errors" => false,
                "base_uri"    => $this->apiUrl,                
            ]);
        }

        return $this->client;
    }   
    
    /**
     * Parse Guzzle response
     *
     * @param [type] $response
     * @return object
     */
    protected function Parse($response) : object
    {
        $body = (string) $response->getBody();

        if( $body == NULL || empty($body) ){
            return (object) [];
        }

        return \json_decode( $body );
    }        
}