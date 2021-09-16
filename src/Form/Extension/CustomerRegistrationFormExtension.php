<?php

declare(strict_types=1);

namespace FluxSE\SyliusHCaptchaPlugin\Form\Extension;

use Sylius\Bundle\CoreBundle\Form\Type\Customer\CustomerRegistrationType;

final class CustomerRegistrationFormExtension extends AbstractHCaptchaFormExtension
{
    public static function getExtendedTypes(): iterable
    {
        yield CustomerRegistrationType::class;
    }
}
