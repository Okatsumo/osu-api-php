<?php

namespace Katsu\OsuApiPhp;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Dto\OAuthClient;
use Katsu\OsuApiPhp\Dto\Proxy;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapById;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapPackById;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapPacks;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapScores;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapsetById;
use Katsu\OsuApiPhp\Endpoints\GetUserBeatmapScore;
use Katsu\OsuApiPhp\Endpoints\GetUserBeatmapScores;
use Katsu\OsuApiPhp\Endpoints\LookupBeatmapsets;
use Katsu\OsuApiPhp\Endpoints\SearchBeatmapsets;
use Katsu\OsuApiPhp\Exceptions\OsuApiException;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmap;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapPack;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapPacks;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapScore;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmapset;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapsetsSearch;
use Katsu\OsuApiPhp\Models\UserScores;
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
     * @throws OsuApiException
     *
     * @return ModelContract|Beatmap
     */
    public function getBeatmapById(int $id): Contracts\ModelContract|Beatmap
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
     * @return Contracts\ModelContract|BeatmapScore
     */
    public function getUserBeatmapScore(int $beatmapId, int $userId, array $params = []): Contracts\ModelContract|BeatmapScore
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
