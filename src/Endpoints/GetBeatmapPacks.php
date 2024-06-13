<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapPacks;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmapPacks extends BaseEndpoint implements EndpointContract
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
        return 'beatmaps/packs';
    }

    public function getHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function getModel(): string
    {
        return BeatmapPacks::class;
    }
}