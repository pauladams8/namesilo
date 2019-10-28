<?php

namespace PaulAdams\Namesilo\Response;

class Response
{
    protected $body;
    
    protected $data;
    
    public function __construct(string $response)
    {
        $this->body = $response;
        
        $this->parseResponse();
    }
    
    /**
     * Parse the response body.
     *
     * @return void
     */
    protected function parseResponse()
    {
        $data = simplexml_load_string($this->body);
        
        $this->data = $data;
    }
    
    /**
     * Get the response body.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * Get the request operation.
     *
     * @return \SimpleXMLElement
     */
    public function getOperation()
    {
        return $this->getRequest()->operation;
    }
    
    /**
     * Get the request data.
     *
     * @return \SimpleXMLElement
     */
    public function getRequest()
    {
        return $this->data->request;
    }
    
    /**
     * Get the request IP address.
     *
     * @return \SimpleXMLElement
     */
    public function getIpAddress()
    {
        return $this->getRequest()->ip;
    }
    
    /**
     * Get the message.
     *
     * @return \SimpleXMLElement
     */
    public function getMessage()
    {
        return $this->getData()->message ?: $this->getDetail();
    }
    
    /**
     * Get the response data.
     *
     * @return \SimpleXMLElement
     */
    public function getData()
    {
        return $this->data->reply;
    }
    
    /**
     * Get the detail.
     *
     * @return \SimpleXMLElement
     */
    public function getDetail()
    {
        return $this->getData()->detail;
    }
    
    /**
     * Determine if the request was successful.
     *
     * @return bool
     */
    public function isSuccessful()
    {
        return in_array($this->getCode(), ['300', '301', '302', '400']);
    }
    
    /**
     * Get the response code.
     *
     * @return \SimpleXMLElement
     */
    public function getCode()
    {
        return $this->getData()->code;
    }
}
