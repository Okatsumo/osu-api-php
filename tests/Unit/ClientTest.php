<?php

use Katsu\OsuApiPhp\BaseClient;
use Katsu\OsuApiPhp\Dto\OAuthClient;
use Katsu\OsuApiPhp\Dto\Proxy;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testCreateClient(): void
    {
        $oauthClient = new OAuthClient(1341, '0');

        $proxy = new Proxy(
            \Katsu\OsuApiPhp\Enums\ProxyType::http,
            'host',
            'login',
            'password',
            3141
        );

        $client = BaseClient::create($oauthClient, $proxy);

        $this->assertInstanceOf(BaseClient::class, $client);
    }
}
