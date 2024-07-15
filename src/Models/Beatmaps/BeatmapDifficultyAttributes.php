<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapDifficultyAttributes extends BaseModel implements ModelContract
{
    public float $star_rating;
    public int $max_combo;
    public float $aim_difficulty;
    public float $speed_difficulty;
    public float $speed_note_count;
    public float $flashlight_difficulty;
    public float $slider_factor;
    public float $approach_rate;
    public float $overall_difficulty;

}
