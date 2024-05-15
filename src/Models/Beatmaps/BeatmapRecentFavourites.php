<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapRecentFavourites extends BaseModel implements ModelContract
{
    public int $id;
    public string $avatar_url;
    public string $country_code;
    public string $default_group;
    public bool $is_active;
    public bool $is_bot;
    public bool $is_deleted;
    public bool $is_online;
    public bool $is_supporter;
    public ?\DateTime $last_visit;
    public bool $pm_friends_only;
    public ?string $profile_colour;
    public string $username;
}
