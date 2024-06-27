<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class CurrentUserPinAttribute extends BaseModel implements ModelContract
{
    public bool $is_pinned;
    public int $score_id;
}
