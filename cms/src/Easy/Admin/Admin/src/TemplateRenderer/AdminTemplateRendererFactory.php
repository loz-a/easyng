<?php

namespace Easy\Admin\Admin\TemplateRenderer;

use Mezzio\LaminasView\LaminasViewRenderer;
use Psr\Container\ContainerInterface;

class AdminTemplateRendererFactory
{
    public function create(ContainerInterface $container): LaminasViewRenderer
    {
        return $container->get(AdminTemplateRendererInterface::DI_ALIAS);
    }
}