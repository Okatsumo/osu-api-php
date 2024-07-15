<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Score\UserScores;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmapScores extends BaseEndpoint implements EndpointContract
{
    public int $beatmapId;

    public function setBeatmapId(int $id): self
    {
        $this->beatmapId = $id;

        return $this;
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
        return str_replace(['{beatmap}'], [$this->beatmapId], 'beatmaps/{beatmap}/solo-scores');
    }

    public function getHeaders(): array
    {
        return [
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    public function getModel(): string
    {
        return UserScores::class;
    }
}
