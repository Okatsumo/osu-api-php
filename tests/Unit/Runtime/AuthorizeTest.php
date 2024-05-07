<?php

namespace Unit\Runtime;

use GuzzleHttp\ClientInterface;
use Katsu\OsuApiPhp\Dto\Tokens;
use Katsu\OsuApiPhp\OsuApiException;
use Katsu\OsuApiPhp\Runtime\Authorize;
use PHPUnit\Framework\TestCase;

class AuthorizeTest extends TestCase
{
    protected int $clientId = 131;

    public function testGetAuthorizationUrl()
    {
        $authorize = new Authorize(
            $this->clientId,
            '0',
            'http://localhost',
            'public'
        );

        $url = $authorize->getAuthorizationUrl();
        $this->assertIsString($url);
        $this->assertEquals('osu.ppy.sh/oauth/authorize?client_id='.$this->clientId.'&redirect_uri=http%3A%2F%2Flocalhost&response_type=code&scope=public', $url);
    }

    private function createHttpClientMock(int $responseCode, $responseBody, $params): ClientInterface
    {
        $httpClientMock = $this->createMock(ClientInterface::class);
        $httpClientMock->expects($this->once())
            ->method('request')
            ->with('POST', 'token', ['form_params' => $params])
            ->willReturn(new \GuzzleHttp\Psr7\Response($responseCode, [], $responseBody));

        return $httpClientMock;
    }

    public function testGetAccessTokenSuccess()
    {
        $clientSecret = 'secret';
        $redirectUri = 'http://localhost';
        $code = 'code';

        $tokensEquals = new Tokens('Bearer', 3600, 'access_token', 'refresh_token');
        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $clientSecret,
            'code'          => $code,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $redirectUri,
        ];

        $httpClientMock = $this->createHttpClientMock(200, '{"token_type": "Bearer", "expires_in": 3600, "access_token": "access_token", "refresh_token": "refresh_token"}', $params);

        $authorize = new Authorize(
            $this->clientId,
            $clientSecret,
            $redirectUri,
            'public',
            $httpClientMock,
        );

        $tokens = $authorize->getAccessToken($code);
        $this->assertEquals($tokensEquals, $tokens);
    }

    public function testGetAccessTokenBadRequest()
    {
        $this->expectException(OsuApiException::class);

        $clientSecret = 'secret';
        $redirectUri = 'http://localhost';
        $code = 'code';

        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $clientSecret,
            'code'          => $code,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $redirectUri,
        ];

        $httpClientMock = $this->createHttpClientMock(400, '{"hint": "Check that all required parameters have been provided", "error_description": "The authorization grant type is not supported by the authorization server."}', $params);

        $authorize = new Authorize(
            $this->clientId,
            $clientSecret,
            $redirectUri,
            'public',
            $httpClientMock,
        );

        $authorize->getAccessToken($code);
    }

    public function testGetAccessTokenServerError()
    {
        $this->expectException(OsuApiException::class);

        $clientSecret = 'secret';
        $redirectUri = 'http://localhost';
        $code = 'code';

        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $clientSecret,
            'code'          => $code,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $redirectUri,
        ];

        $httpClientMock = $this->createHttpClientMock(500, '{"hint": "Check that all required parameters have been provided", "error_description": "The authorization grant type is not supported by the authorization server."}', $params);

        $authorize = new Authorize(
            $this->clientId,
            $clientSecret,
            $redirectUri,
            'public',
            $httpClientMock,
        );

        $authorize->getAccessToken($code);
    }

    public function testGetRefreshTokenServerError()
    {
        $this->expectException(OsuApiException::class);

        $clientSecret = 'secret';
        $redirectUri = 'http://localhost';

        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $clientSecret,
            'grant_type'    => 'refresh_token',
            'redirect_uri'  => $redirectUri,
        ];

        $httpClientMock = $this->createHttpClientMock(500, '{"hint": "Check that all required parameters have been provided", "error_description": "The authorization grant type is not supported by the authorization server."}', $params);

        $authorize = new Authorize(
            $this->clientId,
            $clientSecret,
            $redirectUri,
            'public',
            $httpClientMock,
        );

        $authorize->getRefreshToken('refresh_token');
    }

    public function testGetRefreshTokenBadRequest()
    {
        $this->expectException(OsuApiException::class);

        $clientSecret = 'secret';
        $redirectUri = 'http://localhost';

        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $clientSecret,
            'grant_type'    => 'refresh_token',
            'redirect_uri'  => $redirectUri,
        ];

        $httpClientMock = $this->createHttpClientMock(400, '{"hint": "Check that all required parameters have been provided", "error_description": "The authorization grant type is not supported by the authorization server."}', $params);

        $authorize = new Authorize(
            $this->clientId,
            $clientSecret,
            $redirectUri,
            'public',
            $httpClientMock,
        );

        $authorize->getRefreshToken('refresh_token');
    }

    public function testGetRefreshTokenSuccess()
    {
        $clientSecret = 'secret';
        $redirectUri = 'http://localhost';
        $refreshToken = 'refresh_token';

        $tokensEquals = new Tokens('Bearer', 3600, 'access_token', 'refresh_token');
        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $clientSecret,
            'grant_type'    => 'refresh_token',
            'redirect_uri'  => $redirectUri,
        ];

        $httpClientMock = $this->createHttpClientMock(200, '{"token_type": "Bearer", "expires_in": 3600, "access_token": "access_token", "refresh_token": "refresh_token"}', $params);

        $authorize = new Authorize(
            $this->clientId,
            $clientSecret,
            $redirectUri,
            'public',
            $httpClientMock,
        );

        $tokens = $authorize->getRefreshToken($refreshToken);
        $this->assertEquals($tokensEquals, $tokens);
    }
}
