<?php

declare(strict_types=1);

namespace Easy\Core\Stdlib;

interface ArrayableInterface
{
    public function toArray(): array;
}