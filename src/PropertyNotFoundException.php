<?php

namespace SunnyFlail\ObjectAccessor;

use Exception;

class PropertyNotFoundException extends Exception
{

    public function __construct(string $propertyName, string $className)
    {
        parent::__construct(sprintf(
            "Class %s doesn't have property %s", $className, $propertyName
        ));
    }

}