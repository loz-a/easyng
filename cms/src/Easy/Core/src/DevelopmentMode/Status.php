<?php

declare(strict_types=1);

namespace Easy\Core\DevelopmentMode;

final class Status
{
    private bool $enabled;

    public function __construct(bool $enabled)
    {
        $this->enabled = $enabled;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function isDisabled(): bool
    {
        return !$this->isEnabled();
    }
}