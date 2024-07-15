<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class BaseCursor extends BaseModel implements ModelContract
{
    public int $page;
    public int $limit;
}
