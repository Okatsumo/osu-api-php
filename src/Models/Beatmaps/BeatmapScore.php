<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;
use Katsu\OsuApiPhp\Models\Score\UserScore;

class BeatmapScore extends BaseModel implements ModelContract
{
    public UserScore $score;
}
