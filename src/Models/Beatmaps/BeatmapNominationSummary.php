<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapNominationSummary extends BaseModel implements ModelContract
{
    public int $current;
    public ?array $eligible_main_rulesets;
    public ?BeatmapNominationSummaryRequiredMeta $required_meta;
}
