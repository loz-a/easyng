<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\StoreConfig;

use Easy\Config\Admin\Presentation\Model\TreeBuilder;

class StoreConfig implements StoreConfigInterface
{
    protected TreeBuilder $treeBuilder;
    protected ?array $storeConfig = null;

    public function __construct(TreeBuilder $treeBuilder)
    {
        $this->treeBuilder = $treeBuilder;
    }

    public function toArray(): array
    {
        if (null === $this->storeConfig) {
            $this->storeConfig = $this->treeBuilder->build();
        }

        return $this->storeConfig;
    }
}