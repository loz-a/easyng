<?php

namespace AppAoT;

use AppAoT\Generated\GeneratedInjector;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\DelegatorFactoryInterface;

class InjectorDecoratorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $injector = $callback();

        if (class_exists(GeneratedInjector::class)) {
            return new GeneratedInjector($injector, $container);
        }

        return $injector;
    }
}