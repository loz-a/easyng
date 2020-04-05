<?php

namespace AppAoT;

use Psr\Container\ContainerInterface;
use Laminas\Code\Scanner\DirectoryScanner;
use Laminas\Di\CodeGenerator\InjectorGenerator;

require __DIR__ . '/../vendor/autoload.php';

$directories = [
    __DIR__ . '/../src/App/src',
];

try {
    /** @var ContainerInterface $container */
    $container = require __DIR__ . '/../config/container.php';
    $scanner = new DirectoryScanner($directories);

    /** @var InjectorGenerator $generator */
    $generator = $container->get(InjectorGenerator::class);
    $generator->generate($scanner->getClassNames());

} catch (\Throwable $e) {
    echo $e->getMessage();
}
