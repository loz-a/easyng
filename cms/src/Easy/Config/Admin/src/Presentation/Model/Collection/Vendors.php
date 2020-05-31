<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Collection;

use Easy\Config\Admin\Presentation\Model\Vendor;
use Easy\Core\Stdlib\ArrayableInterface;

final class Vendors implements ArrayableInterface
{
    use CollectionTrait;

    private array $items;

    public function __construct(Vendor ...$vendors)
    {
        $this->items = $vendors;
    }

    public static function fromArray(array $data): self
    {
        $instances = [];
        foreach ($data as $item) {
            $instances[] = Vendor::fromArray($item);
        }
        return new self(...$instances);
    }
}
