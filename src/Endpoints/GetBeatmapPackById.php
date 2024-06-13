<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapPack;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmapPackById extends BaseEndpoint implements EndpointContract
{
    public string $pack;

    public function setId(string $id): void
    {
        $this->pack = $id;
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
        return str_replace(['{pack}'], [$this->pack], 'beatmaps/packs/{pack}');
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
        return BeatmapPack::class;
    }
}
