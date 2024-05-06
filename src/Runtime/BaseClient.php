<?php
namespace Katsu\OsuApiPhp\Runtime;

use GuzzleHttp\ClientInterface;
use Katsu\OsuApiPhp\Dto\OAuthClient;
use Katsu\OsuApiPhp\Dto\Tokens;

abstract class BaseClient
{
    protected ClientInterface $httpClient;
    protected OAuthClient $oauthClient;
    protected ?Tokens $token = null;

    public function __construct(OAuthClient $oauthClient, ClientInterface $httpClient)
    {
        $this->oauthClient = $oauthClient;
        $this->httpClient = $httpClient;
    }

    public function setTokens(Tokens $token): void
    {
        $this->token = $token;
    }
}