<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapsUserCompletion extends BaseModel implements ModelContract
{
    public bool $completed;

    /**
     * @var int[]
     */
    public array $beatmapset_ids;
}
