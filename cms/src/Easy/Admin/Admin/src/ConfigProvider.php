<?php

declare(strict_types=1);

namespace Easy\Admin\Admin;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
        ];
    }

    public function getDependencies(): array
    {
        return [
            'auto' => [
                'types' => [
                    TemplateRenderer\AdminTemplateRendererInterface::class => [
                        'typeOf' => \Mezzio\LaminasView\LaminasViewRenderer::class,
                        'parameters' => [
                            'layout' => 'admin::layout',
                        ]
                    ]
                ]
            ]
        ];
    }

    public function getTemplates(): array
    {
        return [
            'map' => [
                'admin::layout' => __DIR__ . '/../templates/admin/layout.phtml',
            ],
            'paths' => [
                'admin' => [ __DIR__ . '/../templates/admin' ],
            ]
        ];
    }
}