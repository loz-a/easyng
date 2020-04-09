<?php

/**
 * Generated factory for \Easy\Admin\Dashboard\Responder\IndexResponder
 */

namespace AppAoT\Generated\Factory\Easy\Admin\Dashboard\Responder;

use Psr\Container\ContainerInterface;
use Laminas\Di\CodeGenerator\FactoryInterface;

use function array_key_exists;
use function is_array;

final class IndexResponderFactory implements FactoryInterface
{
    public function create(ContainerInterface $container, array $options = [])
    {
        $args = empty($options)
            ? [
                $container->get('Mezzio\\LaminasView\\LaminasViewRenderer'), // adminTemplateRenderer
            ]
            : [
                array_key_exists('adminTemplateRenderer', $options) ? $options['adminTemplateRenderer'] : $container->get('Mezzio\\LaminasView\\LaminasViewRenderer'),
            ];

        return new \Easy\Admin\Dashboard\Responder\IndexResponder(...$args);
    }

    public function __invoke(ContainerInterface $container, $name = null, array $options = null)
    {
        if (is_array($name) && $options === null) {
            $options = $name;
        }

        return $this->create($container, $options ?? []);
    }
}
