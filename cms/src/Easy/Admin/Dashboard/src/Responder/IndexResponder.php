<?php

declare(strict_types=1);

namespace Easy\Admin\Dashboard\Responder;

use Easy\Admin\Admin\TemplateRenderer\AdminTemplateRendererFactory;
use Laminas\Diactoros\Response\HtmlResponse;
use Mezzio\Template\TemplateRendererInterface;
use Psr\Http\Message\ResponseInterface;
use Easy\Admin\Admin\TemplateRenderer\AdminTemplateRendererInterface;

final class IndexResponder
{
    public const TEMPLATE_NAME = 'admin-dashboard::index';

    private AdminTemplateRendererFactory $templateFactory;

    public function __construct(
        AdminTemplateRendererFactory $adminTemplateRendererFactory
    ){
        $this->templateFactory = $adminTemplateRendererFactory;
    }

    public function createResponse(): ResponseInterface
    {
        $html = $this->template->render(self::TEMPLATE_NAME);
        return new HtmlResponse($html);
    }
}