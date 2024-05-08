<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;

class User extends BaseModel implements ModelContract
{
    public int $id;
    public string $avatar_url;
    public string $country_code;
    public ?string $default_group;
    public bool $is_active;
    public bool $is_bot;
    public bool $is_deleted;
    public bool $is_online;
    public bool $is_supporter;
    public ?\DateTime $last_visit;
    public bool $pm_friends_only;
    public ?bool $profile_colour;
    public ?bool $username;
}