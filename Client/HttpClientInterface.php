<?php
/**
 * This file forms part of The Coders Zone Dashboard.
 * Copyright (C) The Coders Zone, 2017 - 2019. All rights reserved.
 * Unauthorized reproduction or modification of this file via any medium is strictly prohibited.
 * Access to this file is bound by the terms of the Endling non-disclosure agreement and can be
 * revoked at any time.
 *
 * @package Dashboard
 * @author  Paul Adams <paul.adams@thecoderszone.com>
 */

namespace Dashboard\Services\Namesilo\Client;

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
