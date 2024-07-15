<?php

namespace Katsu\OsuApiPhp\Endpoints;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Enums\HttpMethod;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapDifficultyAttributesList;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapsetDiscussionPosts;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class GetBeatmapsetDiscussionPosts extends BaseEndpoint implements EndpointContract
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
        return 'beatmapsets/discussions/posts';
    }

    public function getHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }

    public function getModel(): string
    {
        return BeatmapsetDiscussionPosts::class;
    }
}
