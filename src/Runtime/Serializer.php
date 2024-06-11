<?php

namespace Katsu\OsuApiPhp\Runtime;

use Katsu\OsuApiPhp\Contracts\ModelContract;
use Katsu\OsuApiPhp\Exceptions\OsuApiException;

class Serializer
{
    /**
     * Serialize Array to Model.
     *
     * @param array $data
     * @param       $model
     *
     * @throws OsuApiException
     *
     * @return ModelContract
     */
    public function serialize(array $data, $model): ModelContract
    {
        if (empty($data)) {
            throw new OsuApiException('Empty model data', 500);
        }

        $model = new $model();
        $propertyList = $model->getPropertiesList();

        foreach ($propertyList as $property) {
            if (is_null($property->getType())) {
                throw new OsuApiException('Property '.$property->getName().' type not specified', 500);
            }

            $propertyName = $property->getName();
            $propertyValue = $data[$propertyName] ?? null;
            $propertyType = $property->getType()->getName();

            if ($property->getType()->getName() === 'DateTime') {
                $model->$propertyName = $this->setDateTime($propertyValue);
            } elseif ($propertyType === 'int' || $propertyType === 'bool' || $propertyType === 'string' || $propertyType === 'float') {
                $model->$propertyName = $this->setSimpleProperty($propertyName, $propertyValue, $data);
            } elseif (is_array($propertyValue)) {
                $model->$propertyName = $this->setArrayProperty($propertyValue);
            } else {
                if (array_key_exists($propertyName, $data)) {
                    $model->$propertyName = $this->setComplexProperty($propertyValue, $propertyType);
                }
            }
        }

        return $model;
    }

    private function setArrayProperty(array $propertyValue): array
    {
        $array = [];

        if (empty($propertyValue)) {
            return $array;
        }

        foreach ($propertyValue as $key => $value) {
            $array += [$key => $value];
        }

        return $array;
    }

    private function setSimpleProperty(string $propertyName, $propertyValue, array $data)
    {
        if (str_ends_with($propertyName, '_2x')) {
            $propertyName = str_replace('_', '@', $propertyName);

            return $data[$propertyName] ?? null;
        }

        return $propertyValue;
    }

    /**
     * @throws OsuApiException
     */
    private function setComplexProperty($propertyValue, string $propertyType): ?ModelContract
    {
        if (is_null($propertyValue)) {
            return null;
        }

        return $this->serialize((array) $propertyValue, $propertyType);
    }

    protected function setDateTime(string|null $date): ?\DateTime
    {
        if (is_null($date)) {
            return null;
        }

        return \DateTime::createFromFormat('Y-m-d\TH:i:sO', $date);
    }
}
