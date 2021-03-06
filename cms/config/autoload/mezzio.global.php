<?php

declare(strict_types=1);

use Laminas\ConfigAggregator\ConfigAggregator;

return [
    // Toggle the configuration cache. Set this to boolean false, or remove the
    // directive, to disable configuration caching. Toggling development mode
    // will also disable it by default; clear the configuration cache using
    // `composer clear-config-cache`.
    ConfigAggregator::ENABLE_CACHE => true,

    // Enable debugging; typically used to provide debugging information within templates.
    'debug' => false,

    'mezzio' => [
        // Provide templates for the error handling middleware to use when
        // generating responses.
        'error_handler' => [
            'template_404'   => 'error::404',
            'template_error' => 'error::error',
        ],
    ],

    'di_generate' => [
        'scan_directories' => [
            __DIR__ . '/../../src/App/src',
//            __DIR__ . '/../../src/Easy/Core/src',
            __DIR__ . '/../../src/Easy/Admin/Dashboard/src',
            __DIR__ . '/../../src/Easy/Admin/Admin/src',
            __DIR__ . '/../../src/Easy/Config/Admin/src',
        ]
    ],
];
