<?php



namespace Domain\SharedKernel\Service;

use Domain\SharedKernel\Error\Error;

class Serializer implements SerializerInterface
{
    public function serialize($obj) :string
    {
        $objectProperties = get_object_vars($obj);
        return json_encode($objectProperties);
    }

    public function deserialize($json, string $className)
    {
        if (is_string($json)){
            try {
                $json = json_decode($json, true, 512, \JSON_BIGINT_AS_STRING | \JSON_THROW_ON_ERROR);
            } catch (\Throwable $th) {
                throw new \Exception( $th->getMessage(), 500);
            }
        }
        $class = new $className;
        $this->hydrate($json, $class);
        return $class;
    }

    public function hydrate(array $data, object $obj){
        foreach ($data as $key => $value) {
            $method ='set'.ucfirst($key);
            if (method_exists($obj, $method)) {
                $obj->$method($value);
            }
        }
    }
}
