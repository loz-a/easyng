<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Unit\Presentation\Model\StoreConfig;

use Easy\Config\Admin\Presentation\Model\StoreConfig\StoreConfigFactory;
use Easy\Config\Admin\Presentation\Model\StoreConfig\StoreConfigInterface;
use Easy\Config\Admin\Unit\Presentation\Model\StoreConfig\Fixtures\MergeConfigExpectedResult;
use Easy\Config\Admin\Unit\Presentation\Model\StoreConfig\Fixtures\Provider1;
use Easy\Config\Admin\Unit\Presentation\Model\StoreConfig\Fixtures\Provider2;
use Laminas\ServiceManager\ServiceManager;

class StoreConfigTest extends \PHPUnit\Framework\TestCase
{
    protected StoreConfigInterface $storeConfig;

    public function setUp(): void
    {
        $providers = [Provider1::class, Provider2::class];

        $sm = new ServiceManager([
            'services' => [
                'config' => [
                    'store_config' => $providers
                ]
            ]
        ]);

        $this->storeConfig = (new StoreConfigFactory())($sm);
    }

    public function testMergeConfig(): void
    {
        $expected = (new MergeConfigExpectedResult())();
        $config = $this->storeConfig->toArray();
        $this->assertEquals($expected, $config);
    }
}