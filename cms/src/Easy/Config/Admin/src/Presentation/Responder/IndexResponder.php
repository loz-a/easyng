<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Responder;

use Easy\Admin\Admin\TemplateRenderer\Factory as TemplateRendererFactory;

use Easy\Config\Admin\Presentation\Model\StoreConfig\StoreConfigInterface;
use Laminas\Diactoros\Response\HtmlResponse;
use Psr\Http\Message\ResponseInterface;

use function json_encode;

final class IndexResponder
{
    public const TEMPLATE_NAME = 'admin-config::index';

    private TemplateRendererFactory $templateRendererFactory;
    private StoreConfigInterface $storeConfig;

    public function __construct(
        StoreConfigInterface $storeConfig,
        TemplateRendererFactory $templateRendererFactory
    ){
        $this->storeConfig = $storeConfig;
        $this->templateRendererFactory = $templateRendererFactory;
    }

    public function createResponse(): ResponseInterface
    {
        echo '<pre>';
        echo json_encode($this->storeConfig->toArray(), JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
        echo '</pre>'; die;

        $renderer = $this->templateRendererFactory->create();
        $html = $renderer->render(self::TEMPLATE_NAME);
        return new HtmlResponse($html);
    }
}