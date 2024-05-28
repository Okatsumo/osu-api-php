<?php

namespace Katsu\OsuApiPhp\Runtime;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Katsu\OsuApiPhp\Dto\Tokens;
use Katsu\OsuApiPhp\Exceptions\OsuAuthorizeException;

class Authorize
{
    protected string $uri = 'osu.ppy.sh/oauth/';
    protected ClientInterface $httpClient;

    public function __construct(
        protected int $clientId,
        protected string $clientSecret,
        protected string $redirectUri,
        protected string $scopes,
        ClientInterface $httpClient = null,
    ) {
        $this->httpClient = $httpClient ?: $this->createHttpClient();
    }

    protected function createHttpClient(): ClientInterface
    {
        return new Client([
            'base_uri'    => $this->uri,
            'http_errors' => false,
            'headers'     => [
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function getAuthorizationUrl(string $state = ''): string
    {
        $params = [
            'client_id'     => $this->clientId,
            'redirect_uri'  => $this->redirectUri,
            'response_type' => 'code',
            'scope'         => $this->scopes,
        ];

        if (!empty($state)) {
            $params['state'] = $state;
        }

        return $this->uri.'authorize'.'?'.http_build_query($params);
    }

    /**
     * @throws OsuAuthorizeException
     */
    public function getRefreshToken(string $code): Tokens
    {
        return $this->getTokens($code, 'refresh_token');
    }

    /**
     * @throws OsuAuthorizeException
     */
    public function getAccessToken(string $code): Tokens
    {
        return $this->getTokens($code);
    }

    /**
     * @param string $code
     * @param string $grant_type authorization_code | refresh_token
     *
     * @throws OsuAuthorizeException
     *
     * @return Tokens
     */
    protected function getTokens(string $code, string $grant_type = 'authorization_code'): Tokens
    {
        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type'    => $grant_type,
            'redirect_uri'  => $this->redirectUri,
        ];

        if ($grant_type === 'authorization_code') {
            $params['code'] = $code;
        } elseif ($grant_type === 'refresh_token') {
            $params['refresh_token'] = $code;
        } else {
            throw new OsuAuthorizeException('Unknown grant_type', 500);
        }

        try {
            $reponse = $this->httpClient->request('POST', 'token', ['form_params' => $params]);
            $responseData = json_decode($reponse->getBody()->getContents());

            if ($reponse->getStatusCode() == 400) {
                $message = $responseData->hint.': '.$responseData->error_description;

                throw new OsuAuthorizeException($message, 400);
            }

            if ($reponse->getStatusCode() == 500) {
                throw new OsuAuthorizeException('Server error', 500);
            }

            return new Tokens(
                $responseData->token_type,
                $responseData->expires_in,
                $responseData->access_token,
                $responseData->refresh_token,
            );
        } catch (GuzzleException $e) {
            throw new OsuAuthorizeException($e->getMessage(), 500);
        }
    }
}
