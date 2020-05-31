<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Collection;

use Easy\Config\Admin\Presentation\Model\Field\AbstractField;
use Easy\Core\Stdlib\ArrayableInterface;

final class Fields implements ArrayableInterface
{
    use CollectionTrait;

    private array $items;

    public function __construct(AbstractField ...$items)
    {
        $this->items = $items;
    }

    public static function fromArray(array $data): self
    {
        $instances = [];
        foreach ($data as $item) {
            $instances[] = AbstractField::fromArray($item);
        }
        return new self(...$instances);
    }
}