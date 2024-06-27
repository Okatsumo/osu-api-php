<?php

namespace Katsu\OsuApiPhp\Models\Score;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class Mode extends BaseModel implements ModelContract
{
    public string $acronym;
    public array $settings;
}
