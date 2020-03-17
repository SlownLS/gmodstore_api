<?php

namespace SlownLS\GmodStore;

class Collection
{
    use Traits\Util;

    /**
     * Base API URL
     *
     * @var string
     */
    public $apiUrl = 'https://api.gmodstore.com/v2/';

    /**
     * Token access
     * 
     * @var string
     */
    protected $token;  

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function __call($name, $arguments)
    {
        if( !method_exists($this, $name) ){
            throw new Exception("Function don't exist");
        }

        return call_user_func_array( array($this, $name), $arguments);
    }

    /**
     * Make request to API
     *
     * @param string $action
     * @param [type] ...$params
     * @return object
     */
    public function Request(string $action, ...$params)
    {
        $endPoint = $this->endPoints[$action];

        $client = $this->Client();

        if( $endPoint["method"] == "GET" || $endPoint["method"] == "DELETE" ){
            $url = sprintf($endPoint["url"], ...$params);
            
            $response = $client->request($endPoint["method"], $url, [
                "headers" => [ 
                    "Authorization" => "Bearer " . $this->token
                ]
            ]);
        }

        if( $endPoint["method"] == "POST" || $endPoint["method"] == "PUT" ){
            $params = $params[0];

            $url = sprintf($endPoint["url"], ...$params["url"]);
            $post = $params["post"];

            $response = $client->request($endPoint["method"], $url, [
                "headers" => [ 
                    "Authorization" => "Bearer " . $this->token
                ],
                "form_params" => $post
            ]);
        }

        $status = $response->getStatusCode();
        $data = $this->Parse($response);

        if( $status == 500 ){
            return (object) [];
        }

        if( $endPoint["method"] == "POST" ){
            if(  $status != 201 ) {
                return $data;
            }
            
            return (object) [ "success" => 1 ];
        }

        if( $status == 204 ){
            return (object) [ "success" => 1 ]; 
        }

        if( $status != 200 ){
            return (object) [];
        }

        return $data;
    }
}