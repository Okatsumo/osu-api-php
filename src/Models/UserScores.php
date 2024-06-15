<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmap;

class UserScores extends BaseModel implements ModelContract
{
    /**
     * @var UserScore[]
     */
    public array $scores;
}
