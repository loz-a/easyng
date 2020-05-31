<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Collection;

use Easy\Config\Admin\Presentation\Model\FieldsGroup;
use Easy\Core\Stdlib\ArrayableInterface;

final class FieldsGroups implements ArrayableInterface
{
    use CollectionTrait;

    private array $items;

    public function __construct(FieldsGroup ...$groups)
    {
        $this->items = $groups;
    }

    public static function fromArray(array $data): self
    {
        $instances = [];
        foreach ($data as $item) {
            $instances[] = FieldsGroup::fromArray($item);
        }
        return new self(...$instances);
    }
}
