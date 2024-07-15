<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

class BeatmapsetDiscussion
{
    public int $id;
    public int $beatmapset_id;
    public int $beatmap_id;
    public int $user_id;
    public Beatmapset $beatmapset;
    public ?int $deleted_by_id;
    public string $message_type;
    public ?int $parent_id;
    public ?int $timestamp;
    public bool $resolved;
    public bool $can_be_resolved;
    public bool $can_grant_kudosu;
    public \DateTime $created_at;
    public \DateTime $updated_at;
    public ?bool $deleted_at;
    public \DateTime $last_post_at;
    public bool $kudosu_denied;
}