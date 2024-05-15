<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapGenre extends BaseModel implements ModelContract
{
    public ?int $id;
    public string $name;
}