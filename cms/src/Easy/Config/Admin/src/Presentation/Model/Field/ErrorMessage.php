<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Field;

final class ErrorMessage
{
    private string $key;

    private string $value;

    public function __construct(string $key, string $vale)
    {
        $this->key = $key;
        $this->value = $vale;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
