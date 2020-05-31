<?php

declare(strict_types=1);

namespace Easy\Core\Assets\View\Helper;

use Easy\Core\DevelopmentMode\Status  as DevModeStatus;
use Laminas\View\Helper\Asset;

final class AssetDelegator extends \Laminas\View\Helper\AbstractHelper
{
    protected Asset $asset;
    protected DevModeStatus $devModeStatus;

    public function __construct(Asset $asset, DevModeStatus $devModeStatus)
    {
        $this->asset = $asset;
        $this->devModeStatus = $devModeStatus;
    }

    public function __invoke($asset): string
    {
        $resource = ($this->asset)($asset);

        $isAbsolutePath = $this->isAbsolutePath($resource);
        if ($isAbsolutePath) {

            if (!file_exists($resource)) {
                throw new \RuntimeException(sprintf('Invalid asset "%s"', $asset));
            }

            $ds = DIRECTORY_SEPARATOR;
            $destination = sprintf('static%s%s', $ds, $asset);
            $absoluteDestination = sprintf('%s%spublic%s%s', getcwd(), $ds, $ds, $destination);

            if($this->devModeStatus->isEnabled()) {
                $this->copy($resource, $absoluteDestination);
            } else {
                if (!file_exists($absoluteDestination)) {
                    $this->copy($resource, $absoluteDestination);
                }
            }

            return sprintf('%s://%s/%s', $_SERVER['REQUEST_SCHEME'], $_SERVER['HTTP_HOST'], $destination);
        }

        return $resource;
    }

    private function isAbsolutePath(string $file): bool
    {
        return strspn($file, '/\\', 0, 1)
            || (\strlen($file) > 3 && ctype_alpha($file[0])
                && ':' === $file[1]
                && strspn($file, '/\\', 2, 1)
            )
            || null !== parse_url($file, PHP_URL_SCHEME);
    }

    private function supportsSymlinks(): bool
    {
        return in_array(PHP_OS, ['Linux', 'Unix', 'Darwin']);
    }

    private function copy($source, $destination): void
    {
        $dirname = dirname($destination);
        $this->createDir($dirname);

        if (is_link($destination) || file_exists($destination)) {
            unlink($destination);
        }

        if ($this->supportsSymlinks()) {
            symlink(realpath($source), $destination);
            return;
        }

        copy($source, $destination);
    }

    private function createDir($destinationDir): bool
    {
        if (is_dir($destinationDir)) {
            return true;
        }

        $parentDir = dirname($destinationDir);
        if (!is_dir($parentDir)) {
            $this->createDir($parentDir);
        }

        $result = mkdir($destinationDir, 0755, true);
        if (!$result && !is_dir($destinationDir)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $destinationDir));
        }

        return $result;
    }
}