<?php

declare(strict_types=1);

namespace Easy\Config\Admin;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
        ];
    }

    public function getDependencies(): array
    {
        return [];
    }

    public function getTemplates(): array
    {
        return [
            'map' => [
                'admin-config::index' => __DIR__ . '/../templates/admin-config/index.phtml',
            ],
            'paths' => [
                'admin-config' => [ __DIR__ . '/../templates/admin-config' ],
            ]
        ];
    }
}