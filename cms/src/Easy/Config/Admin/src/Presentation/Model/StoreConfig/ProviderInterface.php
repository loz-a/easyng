<?php

namespace Easy\Config\Admin\Presentation\Model\StoreConfig;

interface ProviderInterface
{
    public function __invoke(): array;
}