<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model;

use Easy\Core\Stdlib\ArrayableInterface;

abstract class AbstractConfigItem  implements ArrayableInterface
{
    protected string $alias;
    protected string $label;
    protected ?int $order;

    public function __construct(string $alias, string $label, ?int $order = null)
    {
        $this->alias = strtolower($alias);
        $this->label = $label;
        $this->order = $order;
    }

    abstract public function toArray(): array;

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data)
    {
        switch (false) {
            case isset($data['alias']):
                throw new \InvalidArgumentException('Alias does not provided in module data array');
            case isset($data['label']):
                throw new \InvalidArgumentException('Label does not provided in module data array');
        }

        return new static($data['alias'], $data['label'], $data['order'] ?? null);
    }
}