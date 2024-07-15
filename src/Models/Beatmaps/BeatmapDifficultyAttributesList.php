<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapDifficultyAttributesList extends BaseModel implements ModelContract
{
    public BeatmapDifficultyAttributes $attributes;

}
