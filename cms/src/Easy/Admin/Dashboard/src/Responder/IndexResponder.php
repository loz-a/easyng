<?php

declare(strict_types=1);

namespace Easy\Admin\Dashboard\Responder;

use Easy\Admin\Admin\TemplateRenderer\AdminTemplateRendererInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

final class IndexResponder
{
    public const TEMPLATE_NAME = 'admin-dashboard::index';

    private \Mezzio\LaminasView\LaminasViewRenderer $template;

    public function __construct(
        \Mezzio\LaminasView\LaminasViewRenderer $adminTemplateRenderer
    ){
        $this->template = $adminTemplateRenderer;
    }

    public function createResponse(): ResponseInterface
    {
        $html = $this->template->render(self::TEMPLATE_NAME);
        return new HtmlResponse($html);
    }
}