<?php

namespace Katsu\OsuApiPhp\Models\Score;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;
use Katsu\OsuApiPhp\Models\CurrentUserAttributes;
use Katsu\OsuApiPhp\Models\User;

class UserScore extends BaseModel implements ModelContract
{
    public string $classic_total_score;
    public bool $preserve;
    public bool $processed;
    public bool $ranked;
    public MaximumStatistics $maximum_statistics;

    /**
     * @var Mode[]
     */
    public array $mods;
    public MaximumStatistics $statistics;
    public int $beatmap_id;
    public ?int $best_id;
    public int $id;
    public string $rank;
    public string $type;
    public int $user_id;
    public int $accuracy;
    public int $build_id;
    public \DateTime $ended_at;
    public bool $has_replay;
    public bool $is_perfect_combo;
    public bool $legacy_perfect;
    public ?int $legacy_score_id;
    public int $legacy_total_score;
    public int $max_combo;
    public bool $passed;
    public ?int $pp;
    public ?int $ruleset_id;
    public \DateTime $started_at;
    public int $total_score;
    public bool $replay;
    public CurrentUserAttributes $current_user_attributes;
    public User $user;
}
