<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Responder;

use Easy\Admin\Admin\TemplateRenderer\Factory as TemplateRendererFactory;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

final class IndexResponder
{
    public const TEMPLATE_NAME = 'admin-config::index';

    private TemplateRendererFactory $templateRendererFactory;

    public function __construct(
        TemplateRendererFactory $templateRendererFactory
    ){
        $this->templateRendererFactory = $templateRendererFactory;
    }

    public function createResponse(): ResponseInterface
    {
        $renderer = $this->templateRendererFactory->create();
        $html = $renderer->render(self::TEMPLATE_NAME);
        return new HtmlResponse($html);
    }
}