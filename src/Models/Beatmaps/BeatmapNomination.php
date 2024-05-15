<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapNomination extends BaseModel implements ModelContract
{
    public int $beatmapset_id;
    public string $rulesets;
    public bool $reset;
    public int $user_id;
}
