<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Collection;

use Easy\Core\Stdlib\ArrayableInterface;
use function array_map;
use function array_filter;
use function uasort;

trait CollectionTrait
{
    public function toArray(): array
    {
        $items = array_map(fn(ArrayableInterface $item) => $item->toArray(), $this->items);

        $result = [];
        foreach ($items as $item) {
            $alias = $item['alias'];

            if (isset($result[$alias])) {
                if (null === $item['order']) {
                    unset($item['order']);
                }

                $updateData = array_filter($item, fn($item) => $item !== '' && $item !== null && $item !== '*');
                $result[$alias] = array_merge($result[$alias], $updateData);
            } else {
                if (null === $item['order']) {
                    $item['order'] = 1;
                }

                $item = array_map(fn($item) => $item === '*' ? '' : $item, $item);
                $result[$alias] = $item;
            }
        }

        uasort($result, fn($a, $b) => $a['order'] <=> $b['order']);
        return $result;
    }
}