<?php

declare(strict_types=1);

namespace FluxSE\SyliusHCaptchaPlugin;

use FluxSE\SyliusHCaptchaPlugin\DependencyInjection\CompilerPass\SymfonyHttpClientCompilerPass;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class FluxSESyliusHCaptchaPlugin extends Bundle
{
    use SyliusPluginTrait;

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $container
            ->addCompilerPass(new SymfonyHttpClientCompilerPass())
        ;
    }

    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
