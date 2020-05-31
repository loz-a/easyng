<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Field;

use Easy\Config\Admin\Presentation\Model\Field\Collection\ErrorMessages;

class TextareaField extends AbstractField
{
    public function __construct(
        string $alias,
        string $label,
        string $value,
        string $info = '',
        ?int $order = null,
        string $defaultValue = '',
        ?ErrorMessages $errorMessages = null
    ) {
        $type = Type::createTextarea();
        parent::__construct($alias, $label, $value, $info, $order, $defaultValue, $type, $errorMessages);
    }
}
