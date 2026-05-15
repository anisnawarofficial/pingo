<?php

namespace App\AssetMapper;

use LogicException;
use Symfony\Component\AssetMapper\CompiledAssetMapperConfigReader;

final class DevCompiledAssetMapperConfigReader extends CompiledAssetMapperConfigReader
{
    public function __construct(string $projectDir)
    {
        parent::__construct($projectDir.'/public/assets');
    }

    public function configExists(string $filename): bool
    {
        return false;
    }

    public function loadConfig(string $filename): array
    {
        return [];
    }

    public function saveConfig(string $filename, array $data): string
    {
        throw new LogicException('Compiled AssetMapper config is disabled in APP_ENV=dev.');
    }

    public function removeConfig(string $filename): void
    {
    }
}
