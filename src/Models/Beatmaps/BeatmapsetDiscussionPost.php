<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseCursor;
use Katsu\OsuApiPhp\Models\BaseModel;
use Katsu\OsuApiPhp\Models\User;

class BeatmapsetDiscussionPost extends BaseModel implements ModelContract
{
    public int $id;
    public int $user_id;
    public int $beatmapset_discussion_id;
    public \DateTime $created_at;
    public ?\DateTime $deleted_at;
    public ?\DateTime $deleted_by_id;
    public ?int $last_editor_id;
    public string $message;
    public bool $system;
    public \DateTime $updated_at;
}
