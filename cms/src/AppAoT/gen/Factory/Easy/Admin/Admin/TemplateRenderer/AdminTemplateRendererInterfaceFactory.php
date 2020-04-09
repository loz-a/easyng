<?php

/**
 * Generated factory for \Mezzio\LaminasView\LaminasViewRenderer
 */

namespace AppAoT\Generated\Factory\Easy\Admin\Admin\TemplateRenderer;

use Psr\Container\ContainerInterface;
use Laminas\Di\CodeGenerator\FactoryInterface;

use function array_key_exists;
use function is_array;

final class AdminTemplateRendererInterfaceFactory implements FactoryInterface
{
    public function create(ContainerInterface $container, array $options = [])
    {
        $args = empty($options)
            ? [
                null, // renderer
                null, // layout
                null, // defaultSuffix
            ]
            : [
                array_key_exists('renderer', $options) ? $options['renderer'] : null,
                array_key_exists('layout', $options) ? $options['layout'] : null,
                array_key_exists('defaultSuffix', $options) ? $options['defaultSuffix'] : null,
            ];

        return new \Mezzio\LaminasView\LaminasViewRenderer(...$args);
    }

    public function __invoke(ContainerInterface $container, $name = null, array $options = null)
    {
        if (is_array($name) && $options === null) {
            $options = $name;
        }

        return $this->create($container, $options ?? []);
    }
}
