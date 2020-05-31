<?php

declare(strict_types=1);

namespace Easy\Core;

use Easy\Core\Di\Container\GeneratorFactory;
use Mezzio\Application;

require_once __DIR__ . '/function.php';

class ConfigProvider
{
    public function __invoke(): array
    {


        return [
            'dependencies' => $this->getDependencies(),
            'view_helpers' => $this->getViewHelpers(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'delegators' => [
                Application::class => [
                    \Easy\Core\Routes\InitRoutesDelegator::class,
                ],
            ],
            'factories' => [
                \Laminas\Di\CodeGenerator\InjectorGenerator::class => GeneratorFactory::class,
                DevelopmentMode\Status::class => DevelopmentMode\StatusFactory::class,
            ],
        ];
    }

    public function getViewHelpers(): array
    {
        return [
            'aliases' => [
                'asset' => \Laminas\View\Helper\Asset::class,
                'isDevMode' => \Easy\Core\DevelopmentMode\View\Helper\IsDevMode::class,
            ],
            'factories' => [
                \Laminas\View\Helper\Asset::class => \Laminas\View\Helper\Service\AssetFactory::class,
                \Easy\Core\DevelopmentMode\View\Helper\IsDevMode::class => \Easy\Core\DevelopmentMode\View\Helper\IsDevModeFactory::class,
            ],
            'delegators' => [
                \Laminas\View\Helper\Asset::class => [
                    \Easy\Core\Assets\View\Helper\AssetDelegatorFactory::class,
                ],
            ],
        ];
    }

}