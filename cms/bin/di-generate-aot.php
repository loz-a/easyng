<?php

namespace AppAoT;

use Laminas\Code\Scanner\DirectoryScanner;
use Laminas\Di\CodeGenerator\InjectorGenerator;

require __DIR__ . '/../vendor/autoload.php';

try {
    /** @var \Psr\Container\ContainerInterface $container */
    $container = require __DIR__ . '/../config/container.php';

    $config = $container->get('config');
    if (!isset($config['di_generate']['scan_directories'])) {
        throw new \RuntimeException('Scan directories is not provided');
    }

    $directroies = $config['di_generate']['scan_directories'];
    $scanner = new DirectoryScanner($directroies);

    /** @var InjectorGenerator $generator */
    $generator = $container->get(InjectorGenerator::class);
    $generator->generate($scanner->getClassNames());

} catch (\Throwable $e) {
    echo $e->getMessage();
}