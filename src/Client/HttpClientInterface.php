<?php

namespace PaulAdams\Namesilo\Client;

interface HttpClientInterface
{
    /**
     * HttpClientInterface constructor.
     *
     * @param $apiKey
     * @param $apiUrl
     */
    public function __construct($apiKey, $apiUrl);
    
    /**
     * Send a request.
     *
     * @param $endpoint
     * @param $parameters
     *
     * @return mixed
     */
    public function request($endpoint, $parameters);
}
