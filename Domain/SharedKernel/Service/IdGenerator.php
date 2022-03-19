<?php declare(strict_types=1);

namespace Domain\SharedKernel\Service;

use Ramsey\Uuid\Uuid;

class IdGenerator
{
    public function next()
    {
        return Uuid::uuid4()->toString();
    }
}
