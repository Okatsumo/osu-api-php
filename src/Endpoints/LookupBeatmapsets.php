<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmapset;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class LookupBeatmapsets extends BaseEndpoint implements EndpointContract
{
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
        return str_replace(['{id}'], [$this->id], 'beatmapsets/lookup');
    }

    public function getHeaders(): array
    {
        return ['Accept' => 'application/json'];
    }

    public function getModel(): string
    {
        return Beatmapset::class;
    }
}
