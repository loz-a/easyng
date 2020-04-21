<?php

declare(strict_types=1);

namespace Easy\Admin\Admin\TemplateRenderer;

use Mezzio\LaminasView\LaminasViewRenderer;
use Psr\Container\ContainerInterface;

final class Factory
{
    private ContainerInterface $container;
    private string $instanceName;

    public function __construct(ContainerInterface $container, $instanceName = TemplateRendererInterface::class)
    {
        $this->container = $container;
        $this->instanceName = $instanceName;
    }

    public function create(): LaminasViewRenderer
    {
        return $this->container->get($this->instanceName);
    }
}