# JSON:API

[![No Maintenance Intended](http://unmaintained.tech/badge.svg)](http://unmaintained.tech/)

Simple JSON:API Serialization package

```php
use Attus\JsonApi\Entity;
use Attus\JsonApi\Response;

$entity = new Entity();
$entity->setId($myId);
$entity->setType($myType);
$entity->setLink(['self', 'href'], $myLink);

$entity->setAttribute($name, $value);
$entity->setRelationship($name, $myRelationship);

$data = $entity->getData();

return new Response($data);

```
