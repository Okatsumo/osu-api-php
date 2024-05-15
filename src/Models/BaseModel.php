<?php

namespace Katsu\OsuApiPhp\Models;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use ReflectionClass;

abstract class BaseModel implements ModelContract
{
    public function getPropertiesList()
    {
        return (new ReflectionClass(static::class))->getProperties();
    }
}
