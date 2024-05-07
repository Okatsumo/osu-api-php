<?php

namespace Katsu\OsuApiPhp;

use Katsu\OsuApiPhp\Dto\OAuthClient;
use Katsu\OsuApiPhp\Dto\Proxy;

class BaseClient extends \Katsu\OsuApiPhp\Runtime\BaseClient
{
    protected OAuthClient $oauthClient;

    public function getBeatmapsetById()
    {
        $this->getBeatmapsetById();
    }

    public static function create(OAuthClient $oauthClient, ?Proxy $proxy = null, string $base_uri = 'osu.ppy.sh/api'): BaseClient
    {
        $httpClient = new \GuzzleHttp\Client([
            'base_uri' => $base_uri,
            //            'proxy' => $proxy,
        ]);

        return new self($oauthClient, $httpClient);
    }
}
