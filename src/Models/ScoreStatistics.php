<?php

namespace Katsu\OsuApiPhp\Models;

use Cassandra\Date;
use Katsu\OsuApiPhp\Contracts\ModelContract;

class ScoreStatistics extends BaseModel implements ModelContract
{
    public ?int $count_100;
    public ?int $count_300;
    public ?int $count_50;
    public ?int $count_geki;
    public ?int $count_katu;
    public ?int $count_miss;
}
