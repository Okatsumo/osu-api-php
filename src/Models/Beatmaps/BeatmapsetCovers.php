<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapsetCovers extends BaseModel implements ModelContract
{
    public string $cover;
    public string $cover_2x;
    public string $card;
    public string $card_2x;
    public string $list;
    public string $list_2x;
    public string $slimcover;
    public string $slimcover_2x;
}
