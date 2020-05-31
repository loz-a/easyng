<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Unit\Presentation\Model\StoreConfig\Fixtures;

use Easy\Config\Admin\Presentation\Model\Field\TextField;
use Easy\Config\Admin\Presentation\Model\FieldsGroup;
use Easy\Config\Admin\Presentation\Model\Module;
use Easy\Config\Admin\Presentation\Model\StoreConfig\ProviderInterface;
use Easy\Config\Admin\Presentation\Model\Vendor;

final class Provider2 implements ProviderInterface
{
    public function __invoke(): array
    {
        return [
            'vendors' => [
                new Vendor('easy', '*', 10),
                new Vendor('Dashboard_VENDOR', 'Dashboard Vendor'),
            ],
            'modules' => [
                'easy' => [
                    new Module('test_module', '*', 5),
                    new Module('dashboard_module', 'Dashboard Module in easy'),
                ],
                'DASHBOARD_VENDOR' => [
                    new Module('dashboard_module', 'Dashboard Module'),
                ]
            ],
            'fields_groups' => [
                'easy/test_module' => [
                    new FieldsGroup('test_group_3', 'Test Group 3', 15),
                ],
                'DASHBOARD_VENDOR/DASHBOARD_MODULE' => [
                    new FieldsGroup('db_group_3', 'DB Group 1'),
                ]
            ],
            'fields' => [
                'easy/test_module/test_group_3' => [
                    new TextField('test_field', 'NEW Test Field_1_2', '15', '*', 25, 'Def value for TF_1_2'),
                ],
                'dashboard_vendor/dashboard_module/db_group_3' => [
                    new TextField('db_field', 'Db field', 'Some db value', 'Please enter an info', 10, 'Def value for db'),
                ],
                'easy/test_module/test_group_1' => [
                    new TextField('test_field', 'Test Field_1_2 amended', '*', '*', 8),
                ],
            ]
        ];
    }
}