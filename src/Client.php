<?php

namespace Katsu\OsuApiPhp;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Dto\OAuthClient;
use Katsu\OsuApiPhp\Dto\Proxy;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapAttributes;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapById;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapPackById;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapPacks;
use Katsu\OsuApiPhp\Endpoints\GetBeatmaps;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapScores;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapScoresLegacy;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapsetById;
use Katsu\OsuApiPhp\Endpoints\GetUserBeatmapScore;
use Katsu\OsuApiPhp\Endpoints\GetUserBeatmapScores;
use Katsu\OsuApiPhp\Endpoints\LookupBeatmapsets;
use Katsu\OsuApiPhp\Endpoints\SearchBeatmapsets;
use Katsu\OsuApiPhp\Exceptions\OsuApiException;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapExtended;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapPack;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapPacks;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmaps;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapScoreLegacy;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmapset;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapsetsSearch;
use Katsu\OsuApiPhp\Models\Score\UserScoreLegacy;
use Katsu\OsuApiPhp\Models\Score\UserScores;
use Katsu\OsuApiPhp\Runtime\BaseClient;
use Katsu\OsuApiPhp\Runtime\BaseEndpoint;

class Client extends BaseClient
{
    protected OAuthClient $oauthClient;

    /**
     * Doc: https://osu.ppy.sh/docs/index.html#get-apiv2beatmapsetsbeatmapset.
     *
     * @param int $id
     *
     * @throws OsuApiException
     *
     * @return ModelContract|Beatmapset
     */
    public function getBeatmapsetById(int $id): Contracts\ModelContract|Beatmapset
    {
        return $this
            ->prepareEndpoint(GetBeatmapsetById::class)
            ->setId($id)
            ->execute();
    }

    /**
     * Doc: http://localhost:8080/docs/index.html#get-beatmap.
     *
     * @param int $id
     *
     * @return ModelContract|BeatmapExtended
     *@throws OsuApiException
     *
     */
    public function getBeatmapById(int $id): Contracts\ModelContract|BeatmapExtended
    {
        return $this
            ->prepareEndpoint(GetBeatmapById::class)
            ->setId($id)
            ->execute();
    }

    /**
     * Doc: https://osu.ppy.sh/docs/index.html#get-apiv2beatmapsetslookup.
     *
     * @param int $id
     *
     * @throws OsuApiException
     *
     * @return ModelContract|Beatmapset
     */
    public function lookupBeatmapsets(int $id): Contracts\ModelContract|Beatmapset
    {
        return $this
            ->prepareEndpoint(LookupBeatmapsets::class)
            ->setParameters(['beatmap_id' => $id])
            ->execute();
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#todo-documentation.
     *
     * @param array $params
     *
     * @throws OsuApiException
     *
     * @return ModelContract|BeatmapsetsSearch
     */
    public function searchBeatmapsets(array $params = []): Contracts\ModelContract|BeatmapsetsSearch
    {
        return $this
            ->prepareEndpoint(SearchBeatmapsets::class)
            ->setParameters($params)
            ->execute();
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#get-beatmap-pack.
     *
     * @param string $tag
     * @param array  $params
     *
     * @throws OsuApiException
     *
     * @return ModelContract|BeatmapPack
     */
    public function getBeatmapPackById(string $tag, array $params = []): Contracts\ModelContract|BeatmapPack
    {
        return $this
            ->prepareEndpoint(GetBeatmapPackById::class)
            ->setPack($tag)
            ->setParameters($params)
            ->execute();
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#get-a-user-beatmap-score.
     *
     * @param int   $beatmapId
     * @param int   $userId
     * @param array $params
     *
     * @throws OsuApiException
     *
     * @return Contracts\ModelContract|BeatmapScoreLegacy
     */
    public function getUserBeatmapScore(int $beatmapId, int $userId, array $params = []): Contracts\ModelContract|BeatmapScoreLegacy
    {
        return $this
            ->prepareEndpoint(GetUserBeatmapScore::class)
            ->setParameters($params)
            ->setBeatmapId($beatmapId)
            ->setUserId($userId)
            ->execute();
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#get-a-user-beatmap-scores.
     *
     * @param int   $beatmapId
     * @param int   $userId
     * @param array $params
     *
     * @throws OsuApiException
     *
     * @return Contracts\ModelContract|UserScores
     */
    public function getUserBeatmapScores(int $beatmapId, int $userId, array $params = []): Contracts\ModelContract|UserScores
    {
        return $this
            ->prepareEndpoint(GetUserBeatmapScores::class)
            ->setParameters($params)
            ->setBeatmapId($beatmapId)
            ->setUserId($userId)
            ->execute();
    }

    /**
     *  Returns the top scores for a beatmap. Depending on user preferences, this may only show legacy scores.
     *  Doc: https://osu.ppy.sh/docs/index.html#get-beatmap-scores.
     *
     * @param int   $beatmapId
     * @param array $params
     *
     * @throws OsuApiException
     *
     * @return Contracts\ModelContract|UserScoreLegacy
     */
    public function getBeatmapScoresLegacy(int $beatmapId, array $params = []): Contracts\ModelContract|UserScoreLegacy
    {
        return $this
            ->prepareEndpoint(GetBeatmapScoresLegacy::class)
            ->setParameters($params)
            ->setBeatmapId($beatmapId)
            ->execute();
    }

    /**
     *  Returns the top scores for a beatmap. Depending on user preferences, this may only show legacy scores.
     *  Doc: https://osu.ppy.sh/docs/index.html#get-beatmap-scores-non-legacy.
     *
     * @param int   $beatmapId
     * @param array $params
     *
     * @throws OsuApiException
     *
     * @return Contracts\ModelContract|UserScores
     */
    public function getBeatmapScores(int $beatmapId, array $params = []): Contracts\ModelContract|UserScores
    {
        return $this
            ->prepareEndpoint(GetBeatmapScores::class)
            ->setParameters($params)
            ->setBeatmapId($beatmapId)
            ->execute();
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#get-beatmap-packs.
     *
     * @param array $params
     *
     * @throws OsuApiException
     *
     * @return ModelContract|BeatmapPacks
     */
    public function getBeatmapPacks(array $params = []): Contracts\ModelContract|BeatmapPacks
    {
        return $this
            ->prepareEndpoint(GetBeatmapPacks::class)
            ->setParameters($params)
            ->execute();
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#get-beatmaps.
     *
     * @param array $ids
     *
     * @return Contracts\ModelContract|Beatmaps
     *@throws OsuApiException
     *
     */
    public function getBeatmaps(array $ids = []): Contracts\ModelContract|Beatmaps
    {
        return $this
            ->prepareEndpoint(GetBeatmaps::class)
            ->setParameters(['ids' => $ids])
            ->execute();
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#get-beatmap-attributes.
     *
     * @param int $id
     * @param int|array|null $mods
     * @param null $ruleset
     * @param int|null $ruleset_id
     * @return ModelContract|Beatmaps
     * @throws OsuApiException
     */
    public function getBeatmapAttributes(int $id, int|array $mods = null, $ruleset = null, int $ruleset_id = null): Contracts\ModelContract|Beatmaps
    {
        $params = [];

        if (!is_null($mods)) $params['mods'] = $mods;
        if (!is_null($ruleset)) $params['ruleset'] = $ruleset;
        if (!is_null($ruleset_id)) $params['ruleset_id'] = $ruleset_id;

        return $this
            ->prepareEndpoint(GetBeatmapAttributes::class)
            ->setId($id)
            ->setParameters($params)
            ->execute();
    }

    public static function create(OAuthClient $oauthClient, ?Proxy $proxy = null, string $base_uri = 'https://osu.ppy.sh/api/v2/'): Client
    {
        $httpClient = new \GuzzleHttp\Client([
            'base_uri'   => $base_uri,
            'User-Agent' => 'osu-api-php',
            //            'proxy' => $proxy,
        ]);

        return new self($oauthClient, $httpClient);
    }

    private function prepareEndpoint(string $endpointClass): BaseEndpoint
    {
        return new $endpointClass($this->httpClient, $this->token);
    }
}
