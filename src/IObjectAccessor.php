<?php

namespace SunnyFlail\ObjectAccessor;

interface IObjectAccessor
{

    /**
     * Returns a copy of this object with a new object access
     * 
     * @param object $object Object to access
     * 
     * @return IObjectAccessor
     */
    public function access(object $object): IObjectAccessor;

    /**
     * Checks whether object has a property
     * 
     * @param string $property Name of the property
     * 
     * @return bool
     * 
     * @throws UninitialisedAccessorException
     */
    public function has(string $property): bool;

    /**
     * Checks whether object has a initialised property
     * 
     * @param string $property Name of the property
     * 
     * @return bool
     * 
     * @throws UninitialisedAccessorException
     */
    public function isInitialised(string $property): bool;

    /**
     * Gets value of property
     * Returns null if property wasn't initialised 
     * 
     * @param string $property Name of the property
     * 
     * @return mixed
     * 
     * @throws UninitialisedAccessorException If no object is being accessed
     */
    public function get(string $property): mixed;

    /**
     * Updates value of property
     * 
     * @param string $property Name of the property
     * 
     * @return IObjectAccessor
     * 
     * @throws UninitialisedAccessorException If no object is being accessed
     * @throws PropertyNotFoundException if class doesn't have property with provided name
     */
    public function set(string $property, mixed $value): IObjectAccessor;

    /**
     * Returns the modified object
     * 
     * @return object
     * @throws UninitialisedAccessorException If no object is being accessed
     */
    public function getObject(): object;

}