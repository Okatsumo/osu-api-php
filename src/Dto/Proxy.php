<?php

namespace Katsu\OsuApiPhp\Dto;

use Katsu\OsuApiPhp\Enums\ProxyType;

final class Proxy
{
    public function __construct(
        public ProxyType $type,
        public string $host,
        public string $login,
        public string $password,
        public int $port,
    ) {}
}