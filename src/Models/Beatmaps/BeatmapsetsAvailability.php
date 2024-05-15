<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapsetsAvailability extends BaseModel implements ModelContract
{
    public bool $download_disabled;
    public ?string $more_information;
}
