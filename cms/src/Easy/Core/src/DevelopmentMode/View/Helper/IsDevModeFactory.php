<?php

declare(strict_types=1);

namespace Easy\Core\DevelopmentMode\View\Helper;

use Psr\Container\ContainerInterface;

final class IsDevModeFactory
{
    public function __invoke(ContainerInterface $container): IsDevMode
    {
        $status = $container->get(\Easy\Core\DevelopmentMode\Status::class);
        return new IsDevMode($status);
    }
}
