<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapFailtimes extends BaseModel implements ModelContract
{
    public array $exit;
    public array $fail;
}
