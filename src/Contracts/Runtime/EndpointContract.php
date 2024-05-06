<?php

interface EndpointContract
{
    public function getMethod(): string;
    public function getUri(): string;
    public function getHeaders();
}