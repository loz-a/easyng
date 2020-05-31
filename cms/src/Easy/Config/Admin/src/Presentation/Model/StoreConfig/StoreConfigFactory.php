<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\StoreConfig;

use Easy\Config\Admin\Presentation\Model\TreeBuilder;
use Psr\Container\ContainerInterface;

use function array_merge_recursive;
use function sprintf;

final class StoreConfigFactory
{
    public function __invoke(ContainerInterface $container): StoreConfigInterface
    {
        $config = $container->get('config');
        $storeConfig = $config['store_config'] ?? [];
        $mergedConfig = $this->mergeConfig($storeConfig);
        $treeBuilder = new TreeBuilder($mergedConfig);
        return new StoreConfig($treeBuilder);
    }

    private function mergeConfig(array $providersList): array
    {
        $result = [];
        foreach ($providersList as $providerClass) {
            $provider = $this->resolveProvider($providerClass);
            $providerData = $provider();
            $result[] = $providerData;
        }
        return array_merge_recursive(...$result);
    }

    private function resolveProvider(string $className): ProviderInterface
    {
        if (!class_exists($className)) {
            throw new Exception\InvalidProviderException(sprintf('Provider class %s cannot be loaded', $className));
        }

        return new $className();
    }
}