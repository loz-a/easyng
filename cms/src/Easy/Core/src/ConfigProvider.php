<?php

declare(strict_types=1);

namespace Easy\Core;

use Easy\Core\Di\Container\GeneratorFactory;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies()
        ];
    }

    public function getDependencies(): array
    {
        return [
            'factories' => [
                \Laminas\Di\CodeGenerator\InjectorGenerator::class => GeneratorFactory::class,
            ],
        ];
    }

}