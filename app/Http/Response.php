<?php

namespace App\Http;

class Response
{

    private $statusCode = 200;
    private $headers = [];
    private $contentType;
    private $content;

    public function __construct($statusCode, $content, $contentType = 'text/html')
    {
        $this->statusCode = $statusCode ?? $this->statusCode;
        $this->content = $content;
        $this->setContentType($contentType);
    }

    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    private function sendHeaders()
    {
        http_response_code($this->statusCode);

        foreach ($this->headers as $key => $value) {
            header($key . ':' . $value);
        }
    }

    public function sendResponse()
    {
        $this->sendHeaders();

        switch ($this->contentType) {
            case 'text/html':
                echo $this->content;
                exit;
            case 'application/json':
                echo json_encode($this->content, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                exit;
        }
    }
}
