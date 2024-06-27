<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapScoreLegacy;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetUserBeatmapScore extends BaseEndpoint implements EndpointContract
{
    public int $beatmapId;
    public int $userId;

    public function setBeatmapId(int $id): self
    {
        $this->beatmapId = $id;

        return $this;
    }

    public function setUserId(int $id): self
    {
        $this->userId = $id;

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
        return str_replace(['{beatmap}', '{user}'], [$this->beatmapId, $this->userId], 'beatmaps/{beatmap}/scores/users/{user}');
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
        return BeatmapScoreLegacy::class;
    }
}
