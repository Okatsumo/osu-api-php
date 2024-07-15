<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapDifficultyAttributesList;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmapAttributes extends BaseEndpoint implements EndpointContract
{
    public int $id;

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIsAuthRequired(): bool
    {
        return true;
    }

    public function getMethod(): HttpMethod
    {
        return HttpMethod::POST;
    }

    public function getUri(): string
    {
        return str_replace(['{beatmap}'], [$this->id], 'beatmaps/{beatmap}/attributes');
    }

    public function getHeaders(): array
    {
        return ['Accept' => 'application/json'];
    }

    public function getModel(): string
    {
        return BeatmapDifficultyAttributesList::class;
    }
}
