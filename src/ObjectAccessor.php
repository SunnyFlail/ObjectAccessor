<?php

namespace SunnyFlail\ObjectAccessor;

use ReflectionObject;

class ObjectAccessor implements IObjectAccessor
{

    private ?object $object = null;
    private ReflectionObject $reflection;

    public function access(object $object): IObjectAccessor
    {
        $copy = clone $this;
        $copy->object = $object;
        $copy->reflection = new ReflectionObject($object);

        return $copy;
    }

    public function has(string $property): bool
    {
        $this->checkObject();

        if (!$this->reflection->hasProperty($property)) {
            return false;
        }

        return $this->reflection->getProperty($property)
        ->isInitialized($this->object);
    }

    public function get(string $property): mixed
    {
        $this->checkObject();

        if (!$this->has($property)) {
            return null;
        }
        $property = $this->reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($this->object);
    }

    /**
     * Checks whether accessor was initialised
     * 
     * @throws UninitialisedAccessorException if object access wasn't initialised
     */
    private function checkObject()
    {
        if ($this->object === null) {
            throw new UninitialisedAccessorException();
        }
    }

}