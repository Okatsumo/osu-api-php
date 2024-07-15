<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseCursor;
use Katsu\OsuApiPhp\Models\BaseModel;
use Katsu\OsuApiPhp\Models\User;

class BeatmapsetDiscussionPosts extends BaseModel implements ModelContract
{
    /**
     * @var Beatmapset[]
     */
    public array $beatmapsets;
    public array $discussions;

    /**
     * @var BeatmapsetDiscussionPost[]
     */
    public array $posts;

    /**
     * @var User[]
     */
    public array $users;
    public BaseCursor $cursor;
    public string $cursor_string;
}
