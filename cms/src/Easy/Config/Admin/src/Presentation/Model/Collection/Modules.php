<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Collection;

use Easy\Config\Admin\Presentation\Model\Module;
use Easy\Core\Stdlib\ArrayableInterface;

final class Modules implements ArrayableInterface
{
    use CollectionTrait;

    private array $items;

    public function __construct(Module ...$modules)
    {
        $this->items = $modules;
    }

    public static function fromArray(array $data): self
    {
        $instances = [];
        foreach ($data as $item) {
            $instances[] = Module::fromArray($item);
        }
        return new self(...$instances);
    }
}