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
            'view_helper_config' => [
                'asset' => [
                    'resource_map' => [
                        'css/admin.css' => __DIR__ . '/../assets/css/admin.css',
                    ],
                ],
            ],
        ];
    }

    public function getDependencies(): array
    {
        return [
            'auto' => [
                'types' => [
                    TemplateRenderer\TemplateRendererInterface::class => [
                        'typeOf' => \Mezzio\LaminasView\LaminasViewRenderer::class,
                        'preferences' => [
                            \Laminas\View\Renderer\RendererInterface::class => \Laminas\View\Renderer\PhpRenderer::class,
                        ],
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