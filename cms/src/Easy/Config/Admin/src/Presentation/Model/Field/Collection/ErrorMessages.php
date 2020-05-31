<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model\Field\Collection;

use Countable;
use Easy\Config\Admin\Presentation\Model\Field\ErrorMessage;
use Easy\Core\Stdlib\ArrayableInterface;

final class ErrorMessages implements ArrayableInterface, Countable
{
    /**
     * @var ErrorMessage[]
     */
    private array $errorMessages;

    public function __construct(ErrorMessage ...$errorMessages)
    {
        $this->errorMessages = $errorMessages;
    }

    public function toArray(): array
    {
        $result = [];
        foreach ($this->errorMessages as $errorMessage) {
            $key = $errorMessage->getKey();
            $result[$key] = $errorMessage->getValue();
        }
        return $result;
    }

    public static function fromArray(array $data): self
    {
        $items = [];
        foreach ($data as $key => $value) {
            $items[] = new ErrorMessage($key, $value);
        }

        return new self(...$items);
    }

    public function count(): int
    {
        return count($this->errorMessages);
    }
}