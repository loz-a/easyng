<?php

declare(strict_types=1);

namespace Easy\Config\Admin\Presentation\Model;

use Easy\Config\Admin\Presentation\Model\Collection\Fields;
use Easy\Config\Admin\Presentation\Model\Collection\FieldsGroups;
use Easy\Config\Admin\Presentation\Model\Collection\Modules;
use Easy\Config\Admin\Presentation\Model\Collection\Vendors;
use function array_merge;
use function sprintf;

class TreeBuilder
{
    protected array $storeConfig;

    public function __construct(array $storeConfig)
    {
        $this->storeConfig = $storeConfig;
    }

    public function build(): array
    {
        $configTree = $this->buildVendors($this->storeConfig);
        $configTree = $this->buildModules($this->storeConfig, $configTree);
        $configTree = $this->buildGroups($this->storeConfig, $configTree);
        $configTree = $this->buildFields($this->storeConfig, $configTree);//
        return $configTree;
    }

    protected function buildVendors(array $storeConfig): array
    {
        if (!$this->has('vendors')) {
            return [];
        }

        //@TODO change to injected factory
        $vendorsCollection = new Vendors(...$storeConfig['vendors']);
        return $vendorsCollection->toArray();
    }

    protected function buildModules(array $storeConfig, array $configTree): array
    {
        if (!$this->has('modules')) {
            return $configTree;
        }

        foreach ($storeConfig['modules'] as $path => $modules) {
            if (!is_array($modules)) {
                throw new Exception\ArrayExpectedException(sprintf('Array of modules is expected for path %s', $path));
            }

            //@TODO change to injected factory
            $modulesCollection = new Modules(...$modules);
            foreach ($modulesCollection->toArray() as $module) {
                $uploadPath = strtolower(sprintf('%s/modules/%s', strtolower($path), $module['alias']));
                $configTree = $this->updateByPath($uploadPath, $module, $configTree);
            }
        }

        return $configTree;
    }

    protected function buildGroups(array $storeConfig, array $configTree): array
    {
        if (!$this->has('fields_groups')) {
            return $configTree;
        }

        foreach ($storeConfig['fields_groups'] as $path => $fieldsGroup) {
            if (!is_array($fieldsGroup)) {
                throw new Exception\ArrayExpectedException(sprintf('Array of fields groups is expected for path %s', $path));
            }

            //@TODO change to injected factory
            $groupsCollection = new FieldsGroups(...$fieldsGroup);
            foreach ($groupsCollection->toArray() as $fieldGroup) {
                [$vendor, $module] = explode('/', $path);
                $uploadPath = strtolower(
                    sprintf('%s/modules/%s/fields_groups/%s', strtolower($vendor), strtolower($module), $fieldGroup['alias']));

                $configTree = $this->updateByPath($uploadPath, $fieldGroup, $configTree);
            }
        }

        return $configTree;
    }

    protected function buildFields(array $storeConfig, array $configTree): array
    {
        if (!$this->has('fields')) {
            return $configTree;
        }

        foreach ($storeConfig['fields'] as $path => $fields) {
            if (!is_array($fields)) {
                throw new Exception\ArrayExpectedException(sprintf('Array of fields is expected for path %s', $path));
            }

            //@TODO change to injected factory
            $fieldsCollection = new Fields(...$fields);
            foreach ($fieldsCollection->toArray() as $field) {
                [$vendor, $module, $fieldsGroup] = explode('/', $path);
                $uploadPath = strtolower(
                    sprintf('%s/modules/%s/fields_groups/%s/fields/%s',
                        strtolower($vendor), strtolower($module), strtolower($fieldsGroup), $field['alias']));

                $configTree = $this->updateByPath($uploadPath, $field, $configTree);
            }
        }
        return $configTree;
    }

    protected function has(string $key): bool
    {
        $config = $this->storeConfig[$key] ?? [];
        return is_array($config) && count($config);
    }

    protected function updateByPath(string $path, array $data, array $targetData): array
    {
        $parts = explode('/', $path);
        $targetKey = array_pop($parts);

        $step = &$targetData;
        foreach ($parts as $part) {
            if (!isset($step[$part]) || !is_array($step[$part])) {
                $step[$part] = [];
            }
            $step = &$step[$part];
        }

        $data = array_filter($data, fn($item) => $item !== '*');
        if (isset($step[$targetKey])) {
            $step[$targetKey] = array_merge($step[$targetKey], $data);
        } else {
            $step[$targetKey] = $data;
        }
        unset($step);
        return $targetData;
    }
}