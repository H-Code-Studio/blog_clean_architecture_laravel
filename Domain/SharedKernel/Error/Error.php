<?php declare(strict_types=1);

namespace Domain\SharedKernel\Error;

class Error implements \JsonSerializable
{
    private $fieldName;
    private $message;

    public function __construct(string $fieldName, string $message)
    {
        $this->fieldName = $fieldName;
        $this->message = $message;
    }

    public function __toString(): string
    {
        return $this->fieldName.':'.$this->message;
    }

    public function fieldName(): string
    {
        return $this->fieldName;
    }

    public function message(): string
    {
        return $this->message;
    }
    
    public function jsonSerialize()
    {
        return $this->__toString();
    }
}
