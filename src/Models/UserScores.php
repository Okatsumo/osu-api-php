<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class UserScores extends BaseModel implements ModelContract
{
    /**
     * @var UserScore[]
     */
    public array $scores;
}
