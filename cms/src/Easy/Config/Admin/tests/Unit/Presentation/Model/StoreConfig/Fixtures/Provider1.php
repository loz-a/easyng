<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Unit\Presentation\Model\StoreConfig\Fixtures;

use Easy\Config\Admin\Presentation\Model\Field\Field;
use Easy\Config\Admin\Presentation\Model\Field\TextField;
use Easy\Config\Admin\Presentation\Model\Field\TextareaField;
use Easy\Config\Admin\Presentation\Model\Field\Type;
use Easy\Config\Admin\Presentation\Model\FieldsGroup;
use Easy\Config\Admin\Presentation\Model\Module;
use Easy\Config\Admin\Presentation\Model\StoreConfig\ProviderInterface;
use Easy\Config\Admin\Presentation\Model\Vendor;

final class Provider1 implements ProviderInterface
{
    public function __invoke(): array
    {
        return [
            'vendors' => [
                new Vendor('easy', 'Easy Core'),
            ],
            'modules' => [
                'easy' => [
                    new Module('test_module', 'Test Module'),
                    new Module('another_module', 'Another Module'),
                ]
            ],
            'fields_groups' => [
                'easy/test_module' => [
                    new FieldsGroup('test_group', 'Test Group', 10),
                    new FieldsGroup('test_group_1', 'Test Group 1', 1),
                ],
                'easy/another_module' => [
                    new FieldsGroup('another_group_1', 'Another Group 1'),
                ]
            ],
            'fields' => [
                'easy/test_module/test_group' => [
                    TextareaField::fromArray([
                        'alias' => 'test_field',
                        'label' => 'Test Field',
                        'value' => 'test value',
                        'info' => 'Some test field info',
                        'default_value' => 'def value',
                        'order' => 20
                    ]),
                    new TextField('test_field_1', 'Test Field 1', 'test value 1', 'Some test field info 1', 10),
                    new TextareaField('test_field', 'Test Field_1_2', 'test value 1_2', '', 5),
                ],
                'easy/test_module/test_group_1' => [
                    new TextField('test_field', 'Test Field_1_2', '15'),

                ],
                'easy/another_module/another_group_1' => [
                    new TextField('test_field', 'Another Test Field_1_2', 'Hello world'),
                ],
            ]
        ];
    }
}