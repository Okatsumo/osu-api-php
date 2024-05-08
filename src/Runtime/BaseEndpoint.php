<?php

namespace Katsu\OsuApiPhp\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\TransferStats;
use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Dto\Tokens;
use Katsu\OsuApiPhp\Exceptions\OsuApiException;

abstract class BaseEndpoint implements EndpointContract
{
    protected string $uri;
    protected string $method;
    protected array $headers;
    protected ClientInterface $client;
    protected ?Tokens $tokens;

    public function __construct(Client $httpClient, ?Tokens $tokens = null)
    {
        $this->tokens = $tokens;
        $this->client = $httpClient;
    }

    /**
     * @throws OsuApiException
     */
    public function execute(): ModelContract
    {
        if ($this->getIsAuthRequired() && is_null($this->tokens)) {
            throw new OsuApiException('Authorization required', 403);
        }

        if (!is_null($this->tokens)) {
            $this->headers['Authorization'] = str_replace(['{type}', '{token}'], [$this->tokens->tokenType, $this->tokens->accessToken], '{type} {token}');
        }

        $this->headers['Connection'] = 'keep-alive';

        $options = [
            'connect_timeout' => 60,
            'headers' => $this->headers,
            'on_stats' => function (TransferStats $stats) use (&$url) {
                $url = $stats->getEffectiveUri();
            }
        ];

        try {
            $request = $this->client->request($this->getMethod(), $this->getUri(), $options);
            $data = (array) json_decode($request->getBody()->getContents(), false);

            return $this->transformResponseBody($data);

        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                throw new OsuApiException('401 Unauthorized', 401);

            } elseif($e->getCode() === 404) {
                throw new OsuApiException('404 Resource not found', 404);

            }elseif($e->getCode() === 0) {
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