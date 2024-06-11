<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmap;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmapById extends BaseEndpoint implements EndpointContract
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

    public function getMethod(): HttpMethod
    {
        return HttpMethod::GET;
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], 'beatmaps/{id}');
    }

    public function getHeaders(): array
    {
        return ['Accept' => 'application/json'];
    }

    public function getModel(): string
    {
        return Beatmap::class;
    }
}
