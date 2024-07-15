<?php

namespace Katsu\OsuApiPhp\Models\Score;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class MaximumStatistics extends BaseModel implements ModelContract
{
    public ?int $great;
    public ?int $ignore_hit;
    public ?int $large_bonus;
    public ?int $small_bonus;
    public ?int $large_tick_hit;
    public ?int $slider_tail_hit;
}
