<?php

namespace Katsu\OsuApiPhp\Endpoints;

use EndpointContract;
use Katsu\OsuApiPhp\Runtime\Client\BaseEndpoint;

class GetBeatmapsetById extends BaseEndpoint implements EndpointContract
{
    public function __construct(
        public readonly int $id
    ){}

    public function getMethod(): string
    {
        return 'get';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/beatmapsets/{id}');
    }

    public function getHeaders()
    {
        return ['Accept' => 'application/json'];
    }
}