<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class Beatmaps extends BaseModel implements ModelContract
{
    /**
     * @var BeatmapExtended[]
     */
    public array $beatmaps;
}
