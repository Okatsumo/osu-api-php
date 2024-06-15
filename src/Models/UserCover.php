<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class UserCover extends BaseModel implements ModelContract
{
    public ?string $custom_url;
    public ?string $url;
    public int $id;
}