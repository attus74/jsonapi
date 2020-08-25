# JSON:API

Simple JSON:API Serialization package

```
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
