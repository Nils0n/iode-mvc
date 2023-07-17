<?php

namespace App\Http;

class Request
{
    private $httpMethod;
    private $uri;
    private $queryParams = [];
    private $body = [];
    private $headers = [];

    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->body = $_POST ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    public function getUri()
    {
        return $this->uri;
    }
}
