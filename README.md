[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-github-actions]][link-github-actions]

# Sylius Plugin adding hCaptcha integration

This plugin is adding hCaptcha to the following forms :

- Contact form
- Registration form

But an abstract class is available to add the captcha field to any other `Form\Extension`

## Installation

```bash
composer require flux-se/sylius-hcaptcha-plugin symfony/http-client nyholm/psr7
```
## Configuration

Enable this plugin :

```php
<?php

# config/bundles.php

return [
    // ...
    FluxSE\SyliusHCaptchaPlugin\FluxSESyliusHCaptchaPlugin::class => ['all' => true],
    // ...
];
```

Import global configuration, by creating a new file `config/packages/fluxse_sylius_hcaptcha.yaml` :

```yaml
imports:
  - { resource: "@FluxSESyliusHCaptchaPlugin/config/config.yaml" } 
```

### Meteo Concept hCaptcha Bundle configuration

This plugin is using the `meteo-concept/hcaptcha-bundle` to handle the validation of the
hCaptcha, so a little configuration have to be made.
Add or modify the `meteo-concept/hcaptcha-bundle` configuration :

```yaml
# config/packages/meteo_concept_hcaptcha.yaml

meteo_concept_h_captcha:
  hcaptcha:
    site_key: '%env(resolve:HCAPTCHA_SITE_KEY)%'
    secret: '%env(resolve:HCAPTCHA_SECRET)%'
  validation: 'strict'

```

Finally, add your site key and secret to your `.env.local` file :

```dotenv
###> meteo-concept/hcaptcha-bundle ###
HCAPTCHA_SITE_KEY=10000000-ffff-ffff-ffff-000000000001
HCAPTCHA_SECRET=0x0000000000000000000000000000000000000000
###< meteo-concept/hcaptcha-bundle ###
```

[ico-version]: http://poser.pugx.org/flux-se/sylius-hcaptcha-plugin/v
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-github-actions]: https://github.com/FLUX-SE/SyliusHCaptchaPlugin/workflows/Build/badge.svg

[link-packagist]: https://packagist.org/packages/flux-se/sylius-hcaptcha-plugin
[link-github-actions]: https://github.com/FLUX-SE/SyliusHCaptchaPlugin/actions?query=workflow%3A"Build"
[link-scrutinizer]: https://scrutinizer-ci.com/g/FLUX-SE/SyliusHCaptchaPlugin/code-structure
