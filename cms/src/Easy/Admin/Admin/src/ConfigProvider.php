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
                    TemplateRenderer\AdminTemplateRendererInterface::DI_ALIAS => [
                        'typeOf' => \Mezzio\LaminasView\LaminasViewRenderer::class,
                        'preferences' => [
                            \Laminas\View\Renderer\RendererInterface::class => \Laminas\View\Renderer\PhpRenderer::class,
                        ],
                        'parameters' => [
                            'layout' => 'admin::layout',
                        ]
                    ]
                ]
            ],
            'factories' => [
                TemplateRenderer\AdminTemplateRendererInterface::class => TemplateRenderer\AdminTemplateRendererFactory::class,
            ],
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