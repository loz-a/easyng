<?php

declare(strict_types=1);

namespace Easy\Core\DevelopmentMode\View\Helper;

final class IsDevMode extends \Laminas\View\Helper\AbstractHelper
{
    private $statusService;

    public function __construct(
        \Easy\Core\DevelopmentMode\Status $statusService
    ){
        $this->statusService = $statusService;
    }

    public function __invoke(): bool
    {
        return $this->statusService->isEnabled();
    }
}