<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmaps;
use Katsu\OsuApiPhp\Models\Score\UserScores;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmaps extends BaseEndpoint implements EndpointContract
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
        return 'beatmaps';
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
        return Beatmaps::class;
    }
}
