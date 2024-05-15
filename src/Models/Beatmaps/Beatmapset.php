<?php

namespace Katsu\OsuApiPhp\Models\Beatmaps;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Models\BaseModel;
use Katsu\OsuApiPhp\Models\User;

class Beatmapset extends BaseModel implements ModelContract
{
    public int $id;
    public string $artist;
    public string $artist_unicode;
    public BeatmapsetCovers $covers;
    public string $creator;
    public int $favourite_count;
    public ?bool $hype;
    public bool $nsfw;
    public int $offset;
    public int $play_count;
    public string $preview_url;
    public string $source;
    public bool $spotlight;
    public string $status;
    public string $title;
    public string $title_unicode;
    public ?int $track_id;
    public int $user_id;
    public bool $video;
    public int $bpm;
    public bool $can_be_hyped;
    public ?\DateTime $deleted_at;
    public bool $discussion_enabled;
    public bool $discussion_locked;
    public bool $is_scoreable;
    public \DateTime $last_updated;
    public string $legacy_thread_url;
    public BeatmapNominationSummary $nominations_summary;
    public int $ranked;
    public ?\DateTime $ranked_date;
    public bool $storyboard;
    public ?\DateTime $submitted_date;
    public string $tags;
    public BeatmapsetsAvailability $availability;

    /**
     * @var \Katsu\OsuApiPhp\Models\Beatmaps\Beatmap[]
     */
    public array $beatmaps;
    /**
     * @var \Katsu\OsuApiPhp\Models\Beatmaps\Beatmap[]
     */
    public array $converts;

    /**
     * @var \Katsu\OsuApiPhp\Models\Beatmaps\BeatmapNomination[]
     */
    public array $current_nominations;
    public BeatmapDescription $description;
    public BeatmapGenre $genre;
    public BeatmapLanguage $language;
    public array $pack_tags;

    /**
     * @var int[]
     */
    public array $ratings;

    /**
     * @var BeatmapRecentFavourites[]
     */
    public array $recent_favourites;

    /**
     * @var User[]
     */
    public array $related_users;
    public User $user;

}