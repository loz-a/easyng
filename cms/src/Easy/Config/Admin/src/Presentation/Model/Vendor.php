<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model;

final class Vendor extends AbstractConfigItem
{
    private string $icon;

    public function __construct(
        string $alias,
        string $label,
        ?int $order = null,
        string $icon = ''
    ){
        parent::__construct($alias, $label, $order);
        $this->icon = $icon;
    }

    public function toArray(): array
    {
        return [
            'alias' => $this->alias,
            'label' => $this->label,
            'icon' => $this->icon,
            'order' => $this->order,
            'modules' => [],
        ];
    }

    public static function fromArray(array $data): self
    {
        $data['icon'] = $data['icon'] ?? '';
        return parent::fromArray($data);
    }
}
