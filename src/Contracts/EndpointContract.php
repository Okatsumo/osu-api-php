<?php

namespace Katsu\OsuApiPhp\Contracts;

use Katsu\OsuApiPhp\Enums\HttpMethod;

interface EndpointContract
{
    public function getIsAuthRequired(): bool;
    public function getMethod(): HttpMethod;
    public function getUri(): string;
    public function getHeaders(): array;
    public function getModel(): string;
    public function setParameters(array $params): void;
}