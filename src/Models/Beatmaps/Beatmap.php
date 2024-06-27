<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class Beatmap extends BaseModel implements ModelContract
{
    public int $id;
    public int $beatmapset_id;
    public float $difficulty_rating;
    public string $mode;
    public string $status;
    public int $total_length;
    public int $user_id;
    public string $version;
    public int $accuracy;
    public int $ar;
    public float $bpm;
    public bool $convert;
    public int $count_circles;
    public int $count_sliders;
    public int $count_spinners;
    public int $cs;
    public ?bool $deleted_at;
    public int $drain;
    public int $hit_length;
    public bool $is_scoreable;
    public \DateTime $last_updated;
    public int $mode_int;
    public int $passcount;
    public int $playcount;
    public int $ranked;
    public string $url;
    public string $checksum;
    public BeatmapFailtimes $failtimes;
    public ?int $max_combo;
    public Beatmapset $beatmapset;
}
