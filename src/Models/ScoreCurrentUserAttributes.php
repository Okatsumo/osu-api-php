<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class ScoreCurrentUserAttributes extends BaseModel implements ModelContract
{
    public ScoreCurrentUserPinAttribute $pin;
}
