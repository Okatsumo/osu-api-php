<?php

namespace Katsu\OsuApiPhp\Contracts;

interface EndpointContract
{
    public function getIsAuthRequired(): bool;
    public function getMethod(): string;
    public function getUri(): string;
    public function getHeaders();
    public function getModel(): string;
}