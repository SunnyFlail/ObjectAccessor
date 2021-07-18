<?php

namespace SunnyFlail\ObjectAccessor;

use Exception;

final class UninitialisedAccessorException extends Exception
{

    public function __construct()
    {
        parent::__construct("This accessor wasn't initialised with an object!");
    }

}