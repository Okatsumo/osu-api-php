<?php

namespace Katsu\OsuApiPhp\Dto;

final class OAuthClient
{
    public function __construct(
        public int $id,
        public string $secret,
    ) {
    }
}
