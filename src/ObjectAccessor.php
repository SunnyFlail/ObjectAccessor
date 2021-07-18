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
        if ($this->object === null) {
            throw new UninitialisedAccessorException();
        }

        return $this->reflection->hasProperty($property);
    }

    public function isInitialised(string $property): bool
    {
        if (!$this->has($property)) {
            return false;
        }
        $property = $this->reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->isInitialized($this->object);
    }

    public function get(string $property): mixed
    {
        if (!$this->isInitialised($property)) {
            return null;
        }
        $property = $this->reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($this->object);
    }

    public function set(string $property, mixed $value): IObjectAccessor
    {
        if (!$this->has($property)) {
            throw new PropertyNotFoundException($property, $this->reflection->getName());
        }

        $property = $this->reflection->getProperty($property);
        $property->setAccessible(true);
        $property->setValue($this->object, $value);
        
        return $this;
    }

    public function getObject(): object
    {
        if ($this->object === null) {
            throw new UninitialisedAccessorException();
        }

        return $this->object;
    }
    
}