<?php

declare(strict_types=1);

namespace FluxSE\SyliusHCaptchaPlugin\DependencyInjection\CompilerPass;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpClient\Psr18Client;

final class SymfonyHttpClientCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        if (false === $container->has('psr18.http_client')) {
            return;
        }

        $container->addDefinitions([
            ClientInterface::class => new Definition(Psr18Client::class),
            RequestFactoryInterface::class => new Definition(Psr17Factory::class),
            StreamFactoryInterface::class => new Definition(Psr17Factory::class),
        ]);
    }
}
