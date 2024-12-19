<?php

declare(strict_types=1);

namespace FluxSE\SyliusHCaptchaPlugin\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class FluxSESyliusHCaptchaExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
    }

    public function prepend(ContainerBuilder $container): void
    {
        if ($container->hasExtension('twig')) {
            $container->prependExtensionConfig(
                'twig',
                [
                    'form_themes' => [
                        '@FluxSESyliusHCaptchaPlugin/hcaptcha.html.twig',
                    ],
                ],
            );
        }

        if ($container->hasExtension('sylius_ui')) {
            $container->prependExtensionConfig(
                'sylius_ui',
                [
                    'events' => [
                        'sylius.shop.contact.request.form' => [
                            'blocks' => [
                                'captcha' => [
                                    'template' => '@FluxSESyliusHCaptchaPlugin/form.html.twig',
                                    'priority' => -10,
                                ],
                            ],
                        ],
                        'sylius.shop.register.form' => [
                            'blocks' => [
                                'captcha' => [
                                    'template' => '@FluxSESyliusHCaptchaPlugin/form.html.twig',
                                    'priority' => -10,
                                ],
                            ],
                        ],
                    ],
                ],
            );
        }
    }
}
