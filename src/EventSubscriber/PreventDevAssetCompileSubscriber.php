<?php

namespace App\EventSubscriber;

use Symfony\Component\Console\Event\ConsoleCommandEvent;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelInterface;

final class PreventDevAssetCompileSubscriber implements EventSubscriberInterface
{
    public function __construct(private readonly KernelInterface $kernel)
    {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ConsoleEvents::COMMAND => 'onConsoleCommand',
        ];
    }

    public function onConsoleCommand(ConsoleCommandEvent $event): void
    {
        $command = $event->getCommand();

        if (null === $command || 'asset-map:compile' !== $command->getName()) {
            return;
        }

        if ('dev' !== $this->kernel->getEnvironment()) {
            return;
        }

        $io = new SymfonyStyle($event->getInput(), $event->getOutput());
        $io->error('Do not run asset-map:compile in APP_ENV=dev. Symfony AssetMapper serves assets dynamically in development. Remove public/assets if stale assets appear. Run asset-map:compile only in APP_ENV=prod.');

        $event->disableCommand();
    }
}
