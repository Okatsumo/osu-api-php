<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapPacks extends BaseModel implements ModelContract
{
    /**
     * @var BeatmapPack[]
     */
    public array $beatmap_packs;
    public BeatmapPacksCursor $cursor;
    public string $cursor_string;
}
