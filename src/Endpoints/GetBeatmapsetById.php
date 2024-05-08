<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmapset;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmapsetById extends BaseEndpoint implements EndpointContract
{
    public int $id;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIsAuthRequired(): bool
    {
        return true;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], 'beatmapsets/{id}');
    }

    public function getHeaders()
    {
        return ['Accept' => 'application/json'];
    }

    public function getModel(): string
    {
        return Beatmapset::class;
    }
}