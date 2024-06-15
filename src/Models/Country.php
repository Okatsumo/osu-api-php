<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class Country extends BaseModel implements ModelContract
{
    public string $code;
    public string $name;
}
