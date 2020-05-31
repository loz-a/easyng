<?php

declare(strict_types=1);

namespace Easy\Config\Admin;

use Easy\Config\Admin\Presentation\Model\StoreConfig\StoreConfigFactory;
use Easy\Config\Admin\Presentation\Model\StoreConfig\StoreConfigInterface;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'routes' => $this->getRoutes(),
            'templates' => $this->getTemplates(),
            'store_config' => $this->getStoreConfig(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                StoreConfigInterface::class => StoreConfigFactory::class
            ],
        ];
    }

    public function getRoutes(): array
    {
        return [
            '/admin/config' => [
                'handler' => \Easy\Config\Admin\Infrastructure\Handler\IndexHandler::class,
                'name' => 'admin.config.index'
            ]
        ];
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


    public function getStoreConfig(): array
    {
        return [
            //\Easy\Config\Admin\Presentation\Model\StoreConfig\Provider::class,
        ];
    }
}