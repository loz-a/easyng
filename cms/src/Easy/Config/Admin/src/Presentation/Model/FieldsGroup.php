<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model;

final class FieldsGroup extends AbstractConfigItem
{
    public function toArray(): array
    {
        return [
            'alias' => $this->alias,
            'label' => $this->label,
            'order' => $this->order,
            'fields' => [],
        ];
    }

    public static function fromArray(array $data): self
    {
        return parent::fromArray($data);
    }
}
