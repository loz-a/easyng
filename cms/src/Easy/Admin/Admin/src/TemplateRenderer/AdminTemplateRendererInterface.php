<?php

declare(strict_types=1);

namespace Easy\Admin\Admin\TemplateRenderer;

interface AdminTemplateRendererInterface extends \Mezzio\Template\TemplateRendererInterface
{
    public const DI_ALIAS = 'Easy\Admin\Admin\TemplateRenderer\AdminTemplateRenderer';
}