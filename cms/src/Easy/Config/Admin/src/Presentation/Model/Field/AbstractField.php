<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Field;

use Easy\Config\Admin\Presentation\Model\AbstractConfigItem;
use Easy\Config\Admin\Presentation\Model\Field\Collection\ErrorMessages;

abstract class AbstractField extends AbstractConfigItem
{
    protected string $value;
    protected string $info;
    protected string $defaultValue;
    protected ?Type $type;
    protected ?array $errorMessages;

    public function __construct(
        string $alias,
        string $label,
        string $value,
        string $info = '',
        ?int $order = null,
        string $defaultValue = '',
        ?Type $type = null,
        ?ErrorMessages $errorMessages = null
    ) {
        parent::__construct($alias, $label, $order);

        $this->value = $value;
        $this->info = $info;
        $this->defaultValue = $defaultValue;
        $this->type = $type;
        $this->errorMessages = $errorMessages;
    }

    public function toArray(): array
    {
        return [
            'alias' => $this->alias,
            'label' => $this->label,
            'value' => $this->value,
            'info' => $this->info,
            'default_value' => $this->defaultValue,
            'type' => (string) $this->type,
            'order' => $this->order,
            'error_messages' => $this->errorMessages ? $this->errorMessages->toArray() : [],
        ];
    }

    public static function fromArray(array $data): self
    {
        switch (false) {
            case isset($data['alias']):
                throw new \InvalidArgumentException('Alias for field does not provided');
            case isset($data['label']):
                throw new \InvalidArgumentException('Label for field does not provided');
            case isset($data['value']):
                throw new \InvalidArgumentException('Value for field does not provided');
        }

        return new static(
            $data['alias'],
            $data['label'],
            $data['value'],
            $data['info'] ?? '',
            $data['order'] ?? null,
            $data['default_value'] ?? '',
            $data['type'] ?? null,
            $data['error_messages'] ?? null
        );
    }
}
