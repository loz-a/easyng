<?php

declare(strict_types=1);

namespace AppAoT;

use Laminas\Di\InjectorInterface;

/**
 * The configuration provider for the AppAoT module
 *
 * @see https://docs.laminas.dev/laminas-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies()
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'auto' => [
                'aot' => [
                    'namespace' => __NAMESPACE__ . '\\Generated',
                    'directory' => __DIR__ . '/../gen',
                ]
            ],
            'invokables' => [
            ],
            'factories'  => $this->getGeneratedFactories(),
            'delegators' => [
                InjectorInterface::class => [
                    InjectorDecoratorFactory::class,
                ],
            ],
        ];
    }

    private function getGeneratedFactories()
    {
        // The generated factories.php file is compatible with
        // laminas-servicemanager's factory configuration.
        // This avoids using the abstract AutowireFactory, which
        // improves performance a bit since we spare some lookups.

        if (file_exists(__DIR__ . '/../gen/factories.php')) {
            return include __DIR__ . '/../gen/factories.php';
        }

        return [];
    }
}
