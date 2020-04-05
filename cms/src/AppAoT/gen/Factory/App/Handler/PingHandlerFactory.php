<?php

/**
 * Generated factory for \App\Handler\PingHandler
 */

namespace AppAoT\Generated\Factory\App\Handler;

use Psr\Container\ContainerInterface;
use Laminas\Di\CodeGenerator\FactoryInterface;

use function is_array;

final class PingHandlerFactory implements FactoryInterface
{
    public function create(ContainerInterface $container, array $options = [])
    {
        return new \App\Handler\PingHandler();
    }

    public function __invoke(ContainerInterface $container, $name = null, array $options = null)
    {
        if (is_array($name) && $options === null) {
            $options = $name;
        }

        return $this->create($container, $options ?? []);
    }
}
