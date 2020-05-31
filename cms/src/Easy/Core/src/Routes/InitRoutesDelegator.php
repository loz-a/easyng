<?php

declare(strict_types=1);

namespace Easy\Core\Routes;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\DelegatorFactoryInterface;
use Mezzio\Application;

final class InitRoutesDelegator implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null): Application
    {
        /** @var \Mezzio\Application $application */
        $application = $callback();
        $config = $container->get('config');
        $routesConfig = $config['routes'] ?? [];

        foreach ($routesConfig as $path => $routeData) {
            $handler = null;
            $methods = null;
            $routeName = null;

            if (is_string($routeData)) {
                $handler = $routeData;
            } elseif (is_array($routeData)) {
                $this->ensureArrayContainsHandlerClass($routeData, $path);
                $handler = $routeData['handler'];

                if (isset($routeData['methods'])) {
                    $methods = $routeData['methods'];
                }

                if (isset($routeData['name'])) {
                    $routeName = $routeData['name'];
                }
            }

            $application->route($path, $handler, $methods, $routeName);
        }
        return $application;
    }

    private function ensureArrayContainsHandlerClass(array $data, string $path): void
    {
        if (!isset($data['handler'])) {
            throw new Exception\NotContainsHandlerException('Route data array must contains a handler. Route path "%s"', $path);
        }
    }
}