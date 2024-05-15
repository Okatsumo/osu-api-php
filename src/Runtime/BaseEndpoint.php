<?php

namespace Katsu\OsuApiPhp\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Dto\Tokens;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Exceptions\OsuApiException;

abstract class BaseEndpoint implements EndpointContract
{
    protected string $uri;
    protected string $method;
    protected array $headers;
    protected array $queryParams = [];
    protected ClientInterface $client;
    protected ?Tokens $tokens;

    public function __construct(Client $httpClient, ?Tokens $tokens = null)
    {
        $this->tokens = $tokens;
        $this->client = $httpClient;
    }

    public function setParameters(array $params): void
    {
        $this->queryParams = $params;
    }

    /**
     * Execute endpoint.
     *
     * @throws OsuApiException
     */
    public function execute(): ModelContract
    {
        // Returns exception if endpoint requires authorization and token is empty
        if ($this->getIsAuthRequired() && is_null($this->tokens)) {
            throw new OsuApiException('Authorization required', 403);
        }

        if (!is_null($this->tokens)) {
            $this->headers['Authorization'] = $this->tokens->tokenType.' '.$this->tokens->accessToken;
        }

        $this->headers['Connection'] = 'keep-alive';

        $options = [
            'connect_timeout' => 60,
            'headers'         => $this->headers,
        ];

        if ($this->getMethod() === HttpMethod::GET) {
            $options['query'] = $this->queryParams;
        }

        if ($this->getMethod() === HttpMethod::POST) {
            $options['form_params'] = $this->queryParams;
        }

        try {
            $request = $this->client->request($this->getMethod()->value, $this->getUri(), $options);
            $data = (array) json_decode($request->getBody()->getContents(), false);

            return $this->transformResponseBody($data);
        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                throw new OsuApiException('401 Unauthorized', 401);
            } elseif ($e->getCode() === 404) {
                throw new OsuApiException('404 Resource not found', 404);
            } elseif ($e->getCode() === 0) {
                throw new OsuApiException('HTTP request error: API unavailable', 500);
            } else {
                throw new OsuApiException($e->getMessage(), $e->getCode());
            }
        }
    }

    /**
     * @throws OsuApiException
     */
    protected function transformResponseBody(array $data): ModelContract
    {
        $serializer = new Serializer();

        return $serializer->serialize($data, $this->getModel());
    }
}
