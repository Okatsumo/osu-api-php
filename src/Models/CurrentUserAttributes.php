<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class CurrentUserAttributes extends BaseModel implements ModelContract
{
    public CurrentUserPinAttribute $pin;
}
