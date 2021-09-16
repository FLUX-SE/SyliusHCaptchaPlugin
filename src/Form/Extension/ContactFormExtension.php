<?php

declare(strict_types=1);

namespace FluxSE\SyliusHCaptchaPlugin\Form\Extension;

use Sylius\Bundle\CoreBundle\Form\Type\ContactType;

final class ContactFormExtension extends AbstractHCaptchaFormExtension
{
    public static function getExtendedTypes(): iterable
    {
        yield ContactType::class;
    }
}
