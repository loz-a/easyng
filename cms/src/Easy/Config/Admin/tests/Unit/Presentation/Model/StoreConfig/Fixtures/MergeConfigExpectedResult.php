<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Unit\Presentation\Model\StoreConfig\Fixtures;


class MergeConfigExpectedResult
{
    public function __invoke(): array
    {
        return [
            'easy' => [
                'alias' => 'easy',
                'label' => 'Easy Core',
                'order' => 10,
                'icon' => '',
                'modules' => [
                    'test_module' => [
                        'alias' => 'test_module',
                        'label' => 'Test Module',
                        'order' => 5,
                        'icon' => '',
                        'fields_groups' => [
                            'test_group' => [
                                'alias' => 'test_group',
                                'label' => 'Test Group',
                                'order' => 10,
                                'fields' => [
                                    'test_field' => [
                                        'alias' => 'test_field',
                                        'label' => 'Test Field_1_2',
                                        'value' => 'test value 1_2',
                                        'info' => 'Some test field info',
                                        'default_value' => 'def value',
                                        'type' => 'textarea',
                                        'order' => 5,
                                        'error_messages' => [],
                                    ],
                                    'test_field_1' => [
                                        'alias' => 'test_field_1',
                                        'label' => 'Test Field 1',
                                        'value' => 'test value 1',
                                        'info' => 'Some test field info 1',
                                        'default_value' => '',
                                        'type' => 'text',
                                        'order' => 10,
                                        'error_messages' => [],
                                    ],
                                ]
                            ],
                            'test_group_1' => [
                                'alias' => 'test_group_1',
                                'label' => 'Test Group 1',
                                'order' => 1,
                                'fields' => [
                                    'test_field' => [
                                        'alias' => 'test_field',
                                        'label' => 'Test Field_1_2 amended',
                                        'value' => '15',
                                        'info' => '',
                                        'default_value' => '',
                                        'type' => 'text',
                                        'order' => 8,
                                        'error_messages' => [],
                                    ],
                                ]
                            ],
                            'test_group_3' => [
                                'alias' => 'test_group_3',
                                'label' => 'Test Group 3',
                                'order' => 15,
                                'fields' => [
                                    'test_field' => [
                                        'alias' => 'test_field',
                                        'label' => 'NEW Test Field_1_2',
                                        'value' => '15',
                                        'info' => '',
                                        'default_value' => 'Def value for TF_1_2',
                                        'type' => 'text',
                                        'order' => 25,
                                        'error_messages' => [],
                                    ],
                                ]
                            ]
                        ]
                    ],
                    'another_module' => [
                        'alias' => 'another_module',
                        'label' => 'Another Module',
                        'order' => 1,
                        'icon' => '',
                        'fields_groups' => [
                            'another_group_1' => [
                                'alias' => 'another_group_1',
                                'label' => 'Another Group 1',
                                'order' => 1,
                                'fields' => [
                                    'test_field' => [
                                        'alias' => 'test_field',
                                        'label' => 'Another Test Field_1_2',
                                        'value' => 'Hello world',
                                        'info' => '',
                                        'default_value' => '',
                                        'type' => 'text',
                                        'order' => 1,
                                        'error_messages' => [],
                                    ],
                                ]
                            ]
                        ]
                    ],
                    'dashboard_module' => [
                        'alias' => 'dashboard_module',
                        'label' => 'Dashboard Module in easy',
                        'order' => 1,
                        'icon' => '',
                        'fields_groups' => []
                    ]
                ],
            ],
            'dashboard_vendor' => [
                'alias' => 'dashboard_vendor',
                'label' => 'Dashboard Vendor',
                'order' => 1,
                'icon' => '',
                'modules' => [
                    'dashboard_module' => [
                        'alias' => 'dashboard_module',
                        'label' => 'Dashboard Module',
                        'order' => 1,
                        'icon' => '',
                        'fields_groups' => [
                            'db_group_3' => [
                                'alias' => 'db_group_3',
                                'label' => 'DB Group 1',
                                'order' => 1,
                                'fields' => [
                                    'db_field' => [
                                        'alias' => 'db_field',
                                        'label' => 'Db field',
                                        'value' => 'Some db value',
                                        'info' => 'Please enter an info',
                                        'default_value' => 'Def value for db',
                                        'type' => 'text',
                                        'order' => 10,
                                        'error_messages' => [],
                                    ],
                                ]
                            ]
                        ]
                    ]
                ],
            ]
        ];
    }
}