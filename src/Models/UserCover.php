<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class UserCover extends BaseModel implements ModelContract
{
    public ?string $custom_url;
    public ?string $url;
    public int $id;
}
