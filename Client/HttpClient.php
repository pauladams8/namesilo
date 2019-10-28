<?php
/**
 * This file forms part of The Coders Zone Dashboard.
 * Copyright (C) The Coders Zone, 2017 - 2019. All rights reserved.
 * Unauthorized reproduction or modification of this file via any medium is
 * strictly prohibited. Access to this file is bound by the terms of the
 * Endling non-disclosure agreement and can be revoked at any time.
 *
 * @package Dashboard
 * @author  Paul Adams <paul.adams@thecoderszone.com>
 */

namespace Dashboard\Services\Namesilo\Client;

use Dashboard\Services\Namesilo\Exceptions\HttpClientException;
use Dashboard\Services\Namesilo\Response\Response;

class HttpClient implements HttpClientInterface
{
    private $apiUrl;
    
    private $apiKey;
    
    public function __construct($apiKey, $apiUrl = 'https://www.namesilo.com/api')
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }
    
    /**
     * Send a request.
     *
     * @param $endpoint
     * @param $parameters
     *
     * @return Response
     * @throws HttpClientException
     */
    public function request($endpoint, $parameters)
    {
        $parameters = $parameters[0];
        
        $parameters['version'] = '1';
        $parameters['type'] = 'xml';
        $parameters['key'] = $this->apiKey;
        
        $query = http_build_query($parameters);
        
        $url = sprintf('%s/%s?%s', $this->apiUrl, $endpoint, $query);
        
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
        ]);
        
        $response = curl_exec($curl);
        $error = curl_error($curl);
        
        curl_close($curl);
        
        if ($error) {
            throw new HttpClientException($error);
        }
        
        return new Response($response);
    }
}
