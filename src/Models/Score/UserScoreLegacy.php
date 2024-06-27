<?php

namespace Katsu\OsuApiPhp\Models\Score;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmap;
use Katsu\OsuApiPhp\Models\CurrentUserAttributes;
use Katsu\OsuApiPhp\Models\User;

class UserScoreLegacy extends BaseModel implements ModelContract
{
    public int $id;
    public float $accuracy;
    public ?int $best_id;
    public \DateTime $created_at;
    public int $max_combo;
    public string $mode;
    public int $mode_int;

    /**
     * @var string[]
     */
    public array $mods;
    public bool $passed;
    public bool $perfect;
    public ?float $pp;
    public string $rank;
    public bool $replay;
    public int $score;
    public ScoreStatistics $statistics;
    public string $type;
    public int $user_id;
    public CurrentUserAttributes $current_user_attributes;
    public Beatmap $beatmap;
    public User $user;
}
