<?php declare(strict_types=1);

namespace Domain\SharedKernel\Service;

class Clock
{
    public function now()
    {
        return new \DateTimeImmutable();
    }
}
