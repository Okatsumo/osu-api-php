<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapsetsSearch extends BaseModel implements ModelContract
{
    public array $beatmapsets;
    public BeatmapsetSearchParams $search;
    public ?float $recommended_difficulty;
    public ?array $error;
    public int $total;
    public BeatmapsetCursor $cursor;
    public ?string $cursor_string;
}