<?php

declare(strict_types=1);

namespace Easy\Admin\Dashboard;

use Easy\Config\Admin\Presentation\Model\FieldsGroup;
use Easy\Config\Admin\Presentation\Model\Module;
use Easy\Config\Admin\Presentation\Model\Vendor;
use Easy\Config\Admin\Presentation\Model\Field\{Field, Type};

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            'routes' => $this->getRoutes(),
            'store_config' => $this->getStoreConfig(),
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

    public function getRoutes(): array
    {
        return [
            '/admin/dashboard' => [
                'handler' => \Easy\Admin\Dashboard\Handler\IndexHandler::class,
                'name' => 'admin.dashboard.index'
            ]
        ];
    }

    public function getStoreConfig(): array
    {
        return [
            \Easy\Admin\Dashboard\Presentation\Model\StoreConfig\Provider::class,
        ];
    }

}