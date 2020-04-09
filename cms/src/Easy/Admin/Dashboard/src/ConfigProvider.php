<?php

declare(strict_types=1);

namespace Easy\Admin\Dashboard;

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
                'admin-dashboard::index' => __DIR__ . '/../templates/admin-dashboard/index.phtml',
            ],
            'paths' => [
                'admin-dashboard' => [ __DIR__ . '/../templates/admin-dashboard' ],
            ]
        ];
    }
}