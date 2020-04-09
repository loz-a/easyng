<?php

declare(strict_types=1);

namespace Easy\Admin\Dashboard\Handler;

use Easy\Admin\Dashboard\Responder\IndexResponder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class IndexHandler implements RequestHandlerInterface
{
    private IndexResponder $responder;

    public function __construct(IndexResponder $responder)
    {
        $this->responder = $responder;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return $this->responder->createResponse();
    }

}