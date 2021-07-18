# ObjectAccessor
A simple abstraction layer over accessing object properties
# How to use
After importing it via composer create a initial copy of `ObjectAccessor`
```php
$accessor = new SunnyFlail\ObjectAccessor\ObjectAccessor();
```
## Initialising
To initialise access to object's properties use `ObjectAccessor::access`, providing object you want to access as an argument
```php
$object = new Object();
$objectAccessor = $accessor->access($object);
```
## Checking properties
To check whether object has a property use `ObjectAccessor::has` providing property name as an argument
```php
$hasProperty = $objectAccessor->has('property');
```
To check whether object has an initialised property use `ObjectAccessor::has` providing property name as an argument
```php
$hasProperty = $objectAccessor->isInitialised('property');
```
## Getting property value
To get property value use `ObjectAccessor::get`, providing property name as an argument
```php
$propertyValue = $objectAccessor->get('property');
```
## Changing property value
To get property value use `ObjectAccessor::get`, providing property name as first argument and value as second
```php
$objectAccessor->set('property', 123);
```
