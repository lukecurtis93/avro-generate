# Avro Generate

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lukecurtis93/avro-generate.svg?style=flat-square)](https://packagist.org/packages/lukecurtis93/avro-generate)
[![Tests](https://github.com/lukecurtis93/avro-generate/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/lukecurtis93/avro-generate/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/lukecurtis93/avro-generate.svg?style=flat-square)](https://packagist.org/packages/lukecurtis93/avro-generate)

Avro Generate is a small PHP CLI Application to allow you generate Avro definitions from your classes.

To use this package, simply implement the `Avroable` interface and define your definitions as per the Flixtech package

```php
use FlixTech\AvroSerializer\Objects\Schema\Generation\Annotations;
use LukeCurtis\AvroGenerate\Contracts\Avroable;

/**
 * @Annotations\AvroType("record")
 * @Annotations\AvroName("user")
 */
class User implements Avroable
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
php bin/avro generate --output=./resources/avro
```

This will generate the Avro schemas for your Avroable classes.

### Coming Soon
- Specify directories or explicit files for generation.
- Upload these Avro files to a Schema Registry.
- Checking for namesapces to be compatible with Confluent Schema Registry and UI.
- Versioned schemas

## Installation

You can install the package via composer:

```bash
composer require lukecurtis93/avro-generate
```

## Usage

If you want to use the underlying generator for your own needs you can simply import and use the class.

```php
$generator = new LukeCurtis\DefaultAvroGenerator();
echo $generator->generate();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Luke Curtis](https://github.com/lukecurtis93)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
