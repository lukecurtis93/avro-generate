
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Avro Generate

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lukecurtis93/avro-generate.svg?style=flat-square)](https://packagist.org/packages/lukecurtis93/avro-generate)
[![Tests](https://github.com/lukecurtis93/avro-generate/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/lukecurtis93/avro-generate/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/lukecurtis93/avro-generate.svg?style=flat-square)](https://packagist.org/packages/lukecurtis93/avro-generate)

Avro Generate is a small PHP CLI Application to allow you generate Avro definitions from your classes.

To use this package, simply implement the `Avroable` interface and define your definitions as per the Flixtech package

```php
use FlixTech\AvroSerializer\Objects\Schema\Generation\Annotations;
use LukeCurtis\AvroGenerate\Contracts\AvroableContract;

/**
 * @Annotations\AvroType("record")
 * @Annotations\AvroName("user")
 */
class User implements AvroableContract
{
        /**
         * @Annotations\AvroType("string")
         * @var string
         */
        private $firstName;
//
```

Then you can run

```
php bin/console avro:generate

```

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/avro-generate.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/avro-generate)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require lukecurtis93/avro-generate
```

## Usage

```php
$skeleton = new LukeCurtis\AvroGenerate();
echo $skeleton->echoPhrase('Hello, LukeCurtis!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Luke Curtis](https://github.com/lukecurtis93)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
