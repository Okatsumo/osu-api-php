<?php

namespace Katsu\OsuApiPhp;

use Katsu\OsuApiPhp\Dto\OAuthClient;
use Katsu\OsuApiPhp\Dto\Proxy;
use Katsu\OsuApiPhp\Endpoints\GetBeatmapsetById;
use Katsu\OsuApiPhp\Models\Beatmaps\Beatmapset;
use Katsu\OsuApiPhp\Runtime\BaseClient;

class Client extends BaseClient
{
    protected OAuthClient $oauthClient;

    public function getBeatmapsetById(int $id): Beatmapset
    {
        return $this->executeEndpoint(GetBeatmapsetById::class, $id);
    }

    public static function create(OAuthClient $oauthClient, ?Proxy $proxy = null, string $base_uri = 'https://osu.ppy.sh/api/v2/'): Client
    {
        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => $base_uri,
            'User-Agent' => 'osu-api-php',
//            'proxy' => $proxy,
        ]);

        return new self($oauthClient, $httpClient);
    }

    protected function executeEndpoint(string $endpointClass, ?int $id = null)
    {
        $endpoint = new $endpointClass($this->httpClient, $this->token);

        if (!is_null($id)) {
            $endpoint->setId($id);
        }

        return $endpoint->execute();
    }
}