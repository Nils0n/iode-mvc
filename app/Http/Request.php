<?php

namespace App\Http;

class Request
{

    private $router;
    private $httpmethod;
    private $uri;
    private $queryParams = [];
    private $postVars = [];
    private $headers = [];

    public function  __construct($router)
    {
        $this->router = $router;
        $this->queryParams = $_GET ?? [];
        $this->headers     = getallheaders();
        $this->httpmethod  = $_SERVER['REQUEST_METHOD'] ?? '';
        $this->setUri();
        $this->setPostVars();
    }

    private function setPostVars()
    {
        if ($this->httpmethod == 'GET') return false;

        $this->postVars = $_POST ?? [];

        $inputRaw = file_get_contents('php://input');
        $this->postVars = (strlen($inputRaw) && empty($_POST)) ? json_decode($inputRaw, true) : $this->postVars;
    }


    public function setUri()
    {
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';

        $xURI = explode('?', $this->uri);
        $this->uri = $xURI[0];
    }


    public function getRouter()
    {
        return $this->router;
    }


    public function getHttpMethod()
    {
        return $this->httpmethod;
    }


    public function getUri()
    {
        return $this->uri;
    }


    public function getHeaders()
    {
        return $this->headers;
    }


    public function getQueryParams()
    {
        return $this->queryParams;
    }


    public function getPostVars()
    {
        return $this->postVars;
    }
}
