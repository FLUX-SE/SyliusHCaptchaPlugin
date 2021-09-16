<?php

declare(strict_types=1);

namespace FluxSE\SyliusHCaptchaPlugin\DependencyInjection\CompilerPass;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

final class SymfonyHttpClientCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (false === $container->has('psr18.http_client')) {
            return;
        }

        $container->addDefinitions([
            RequestFactoryInterface::class => new Definition(Psr17Factory::class),
            StreamFactoryInterface::class => new Definition(Psr17Factory::class),
        ]);
    }
}
