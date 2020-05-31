<?php

declare(strict_types=1);

namespace Easy\Core\Assets\View\Helper;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\DelegatorFactoryInterface;

final class AssetDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $asset = $callback();
        $devModeStatus = $container->get(\Easy\Core\DevelopmentMode\Status::class);

        return new AssetDelegator($asset, $devModeStatus);
    }

}