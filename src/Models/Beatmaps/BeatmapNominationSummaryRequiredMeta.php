<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapNominationSummaryRequiredMeta extends BaseModel implements ModelContract
{
    public int $main_ruleset;
    public int $non_main_ruleset;
}
