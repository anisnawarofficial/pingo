<?php

declare(strict_types=1);

$projectDir = dirname(__DIR__);
$publicAssetsDir = $projectDir.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'assets';
$backupRoot = $projectDir.DIRECTORY_SEPARATOR.'var'.DIRECTORY_SEPARATOR.'compiled-assets-backups';

if (!is_dir($publicAssetsDir)) {
    echo "No public/assets directory found. Dev assets are already dynamic.\n";
    exit(0);
}

if (!is_dir($backupRoot) && !mkdir($backupRoot, 0777, true) && !is_dir($backupRoot)) {
    fwrite(STDERR, "Could not create backup directory: {$backupRoot}\n");
    exit(1);
}

$timestamp = date('Ymd-His');
$backupDir = $backupRoot.DIRECTORY_SEPARATOR.'assets-'.$timestamp;
$suffix = 1;

while (file_exists($backupDir)) {
    $backupDir = $backupRoot.DIRECTORY_SEPARATOR.'assets-'.$timestamp.'-'.$suffix;
    ++$suffix;
}

if (!rename($publicAssetsDir, $backupDir)) {
    fwrite(STDERR, "Could not move public/assets to backup directory.\n");
    exit(1);
}

echo "Moved stale public/assets to {$backupDir}\n";
echo "Development will now use Symfony AssetMapper dynamic assets from assets/.\n";
