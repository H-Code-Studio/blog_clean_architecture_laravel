<?php

namespace Domain\SharedKernel\Service;

interface SerializerInterface {
    public function serialize($obj):string;
    public function deserialize($data, string $className);
}
