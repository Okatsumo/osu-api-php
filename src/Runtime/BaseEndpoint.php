<?php

namespace Katsu\OsuApiPhp\Runtime;

use EndpointContract;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

abstract class BaseEndpoint implements EndpointContract
{
    protected string $uri;
    protected string $method;
    protected array $headers;
    protected ClientInterface $client;

    public function __construct(Client $httpClient)
    {
        $this->uri = $this->getUri();
        $this->method = $this->getMethod();
        $this->headers = $this->getHeaders();
    }

    public function execute()
    {
    }
}
