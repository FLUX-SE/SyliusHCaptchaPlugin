<?php

declare(strict_types=1);

namespace FluxSE\SyliusHCaptchaPlugin\Form\Extension;

use MeteoConcept\HCaptchaBundle\Form\HCaptchaType;
use MeteoConcept\HCaptchaBundle\Validator\Constraints\IsValidCaptcha;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

abstract class AbstractHCaptchaFormExtension extends AbstractTypeExtension
{
    /** @var string[]|null */
    protected $validationGroups;

    /**
     * @param string[]|null $validationGroups
     */
    public function __construct(?array $validationGroups = null)
    {
        $this->validationGroups = $validationGroups;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $validatorOptions = [];
        if (null !== $this->validationGroups) {
            $validatorOptions['groups'] = $this->validationGroups;
        }

        $isValidCaptcha = new IsValidCaptcha($validatorOptions);
        $isValidCaptcha->message = 'fluxse.sylius_hcaptcha_plugin.form.captcha.is_valid_captcha';

        $validatorOptions['message'] = 'fluxse.sylius_hcaptcha_plugin.form.captcha.not_blank';
        $notBlank = new NotBlank($validatorOptions);

        $builder->add('captcha', HCaptchaType::class, [
            'constraints' => [
                $isValidCaptcha,
                $notBlank,
            ],
        ]);
    }
}
