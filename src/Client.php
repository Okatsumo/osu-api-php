<?php

namespace Katsu\OsuApiPhp;

use Katsu\OsuApiPhp\Contracts\EndpointContract;
use Katsu\OsuApiPhp\Dto\OAuthClient;
use Katsu\OsuApiPhp\Dto\Proxy;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapsetById;
use Katsu\OsuApiPhp\Endpoints\SearchBeatmapsets;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmapset;
use Katsu\OsuApiPhp\Models\Beatmaps\BeatmapsetsSearch;
use Katsu\OsuApiPhp\Runtime\BaseClient;

class Client extends BaseClient
{
    protected OAuthClient $oauthClient;

    /**
     * Doc: https://osu.ppy.sh/docs/index.html#get-apiv2beatmapsetsbeatmapset.
     *
     * @param int $id
     *
     * @return Beatmapset
     */
    public function getBeatmapsetById(int $id): Beatmapset
    {
        return $this->executeEndpoint(GetBeatmapsetById::class, $id);
    }

    /**
     *  Doc: https://osu.ppy.sh/docs/index.html#todo-documentation.
     *
     * @param array $params
     *
     * @return BeatmapsetsSearch
     */
    public function searchBeatmapsets(array $params = []): BeatmapsetsSearch
    {
        return $this->executeEndpoint(SearchBeatmapsets::class, null, $params);
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

    protected function executeEndpoint(string $endpointClass, ?int $id = null, array $params = [])
    {
        /** @var EndpointContract $endpoint */
        $endpoint = new $endpointClass($this->httpClient, $this->token);

        if (!is_null($id)) {
            $endpoint->setId($id);
        }

        if (!empty($params)) {
            $endpoint->setParameters($params);
        }

        return $endpoint->execute();
    }
}
