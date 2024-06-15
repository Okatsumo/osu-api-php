<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;
use Katsu\OsuApiPhp\Models\UserScore;

class BeatmapScore extends BaseModel implements ModelContract
{
    public int $position;
    public UserScore $score;
}
