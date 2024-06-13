<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;

class BeatmapPack extends BaseModel implements ModelContract
{
    public string $author;
    public \DateTime $date;
    public string $name;
    public bool $no_diff_reduction;
    public int $ruleset_id;
    public string $tag;
    public string $url;

    /**
     * @var Beatmapset[]
     */
    public array $beatmapsets;
    public BeatmapsUserCompletion $user_completion_data;

}