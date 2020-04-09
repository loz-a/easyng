<?php

/**
 * Generated factory for \Easy\Admin\Admin\ConfigProvider
 */

namespace AppAoT\Generated\Factory\Easy\Admin\Admin;

use Psr\Container\ContainerInterface;
use Laminas\Di\CodeGenerator\FactoryInterface;

use function is_array;

final class ConfigProviderFactory implements FactoryInterface
{
    public function create(ContainerInterface $container, array $options = [])
    {
        return new \Easy\Admin\Admin\ConfigProvider();
    }

    public function __invoke(ContainerInterface $container, $name = null, array $options = null)
    {
        if (is_array($name) && $options === null) {
            $options = $name;
        }

        return $this->create($container, $options ?? []);
    }
}
