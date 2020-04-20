<?php

declare(strict_types=1);

namespace App\Handler;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

use Laminas\Code\Scanner\DirectoryScanner;
use Laminas\Di\CodeGenerator\InjectorGenerator;

use function time;

class PingHandler implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request) : ResponseInterface
    {

        //https://docs.laminas.dev/laminas-di/config/

        $directories = [
            getcwd() . '/src/App/src',
            getcwd() . '/src/Easy/Admin/Dashboard/src',
            getcwd() . '/src/Easy/Admin/Admin/src',
        ];

        $container = require getcwd() . '/config/container.php';
        $scanner = new DirectoryScanner($directories);

        /** @var InjectorGenerator $generator */
        $generator = $container->get(InjectorGenerator::class);
        $generator->generate($scanner->getClassNames());

        return new JsonResponse(['ack' => time()]);
    }
}
