<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class Country extends BaseModel implements ModelContract
{
    public string $code;
    public string $name;
}