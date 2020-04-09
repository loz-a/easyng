<?php

/**
 * Generated factory for \Easy\Admin\Dashboard\Handler\IndexHandler
 */

namespace AppAoT\Generated\Factory\Easy\Admin\Dashboard\Handler;

use Psr\Container\ContainerInterface;
use Laminas\Di\CodeGenerator\FactoryInterface;

use function array_key_exists;
use function is_array;

final class IndexHandlerFactory implements FactoryInterface
{
    public function create(ContainerInterface $container, array $options = [])
    {
        $args = empty($options)
            ? [
                $container->get('Easy\\Admin\\Dashboard\\Responder\\IndexResponder'), // responder
            ]
            : [
                array_key_exists('responder', $options) ? $options['responder'] : $container->get('Easy\\Admin\\Dashboard\\Responder\\IndexResponder'),
            ];

        return new \Easy\Admin\Dashboard\Handler\IndexHandler(...$args);
    }

    public function __invoke(ContainerInterface $container, $name = null, array $options = null)
    {
        if (is_array($name) && $options === null) {
            $options = $name;
        }

        return $this->create($container, $options ?? []);
    }
}
