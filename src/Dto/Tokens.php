<?php

namespace Katsu\OsuApiPhp\Dto;

final readonly class Tokens
{
    public function __construct(
        public string $tokenType,
        public int $expiresIn,
        public string $accessToken,
        public string $refreshToken,
    ) {
    }
}
