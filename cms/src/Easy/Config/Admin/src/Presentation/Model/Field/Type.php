<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Field;

final class Type
{
    public const TYPE_TEXT = 'text';
    public const TYPE_TEXTAREA = 'textarea';
    public const TYPE_SELECT = 'select';
    public const TYPE_CHECKBOX = 'checkbox';

    private static $availableTypes = [
        self::TYPE_CHECKBOX,
        self::TYPE_SELECT,
        self::TYPE_TEXT,
        self::TYPE_TEXTAREA,
    ];

    private $value;

    public function __construct(string $type)
    {
        if (!in_array($type, self::$availableTypes, false)) {
            throw new Exception\InvalidArgumentException('Invalid Type has been passed to constructor');
        }

        $this->value = $type;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public static function create(string $type): Type
    {
        return new self($type);
    }

    public static function createText(): Type
    {
        return new self(self::TYPE_TEXT);
    }

    public static function createTextarea(): Type
    {
        return new self(self::TYPE_TEXTAREA);
    }

    public static function createSelect(): Type
    {
        return new self(self::TYPE_SELECT);
    }

    public static function createCheckbox(): Type
    {
        return new self(self::TYPE_CHECKBOX);
    }
}
