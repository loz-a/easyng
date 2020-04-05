<?php

/**
 * Generated factory for \App\Handler\HomePageHandler
 */

namespace AppAoT\Generated\Factory\App\Handler;

use Psr\Container\ContainerInterface;
use Laminas\Di\CodeGenerator\FactoryInterface;

use function array_key_exists;
use function is_array;

final class HomePageHandlerFactory implements FactoryInterface
{
    public function create(ContainerInterface $container, array $options = [])
    {
        $args = empty($options)
            ? [
                $container->get('Mezzio\\Router\\RouterInterface'), // router
                $container->get('Mezzio\\Template\\TemplateRendererInterface'), // template
            ]
            : [
                array_key_exists('router', $options) ? $options['router'] : $container->get('Mezzio\\Router\\RouterInterface'),
                array_key_exists('template', $options) ? $options['template'] : $container->get('Mezzio\\Template\\TemplateRendererInterface'),
            ];

        return new \App\Handler\HomePageHandler(...$args);
    }

    public function __invoke(ContainerInterface $container, $name = null, array $options = null)
    {
        if (is_array($name) && $options === null) {
            $options = $name;
        }

        return $this->create($container, $options ?? []);
    }
}
