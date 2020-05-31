<?php

declare(strict_types=1);

namespace Easy\Core\DevelopmentMode;

use Laminas\DevelopmentMode\Status as DevModeStatus;
use Psr\Container\ContainerInterface;

final class StatusFactory
{
    public function __invoke(ContainerInterface $container): Status
    {
        return new Status($this->isEnabled());
    }

    private function isEnabled()
    {
        $status = new DevModeStatus(getcwd());
        $result = false;

        ob_start(static function(string $buffer) use (&$result) {
            $result = false !== stripos($buffer, 'ENABLED');
            return false;
        });
        $status();
        ob_end_clean();

        return $result;
    }
}