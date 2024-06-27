<?php

namespace Katsu\OsuApiPhp\Models\Score;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class UserScores extends BaseModel implements ModelContract
{
    /**
     * @var UserScore[]
     */
    public array $scores;
}
