# laravel-validator-nric-fin

[![Latest Version on Packagist](https://img.shields.io/packagist/v/repat/laravel-validator-nric-fin.svg?style=flat-square)](https://packagist.org/packages/repat/laravel-validator-nric-fin)
[![Total Downloads](https://img.shields.io/packagist/dt/repat/laravel-validator-nric-fin.svg?style=flat-square)](https://packagist.org/packages/repat/laravel-validator-nric-fin)

**laravel-validator-nric-fin** is a [custom Rule Object / Validator](https://laravel.com/docs/8.x/validation#custom-validation-rules) for Laravel that validates the _National Registration Identity Card_ (NRIC) and _Foreign Identification Number (FIN)_ of Singapore.

* [More information on the structure of NRIC / FIN](https://en.wikipedia.org/wiki/National_Registration_Identity_Card#Structure_of_the_NRIC_number/FIN)
* [Gist this is based on](https://gist.github.com/kamerk22/ed5e0778b3723311d8dd074c792834ef) (thx, [kamerk22](https://github.com/kamerk22)!)

## Installation

`$ composer require repat/laravel-validator-nric-fin`

## Documentation

```php

use Illuminate\Http\Request;
use Repat\LaravelRules\NricFin;

// ...

public function controllerMethod(Request $request) {
    $request->validate([
        'nric' => new NricFin,
    ]);

    //
}

```

## Tests

```sh
vendor/bin/phpunit
```

## License

* MIT, see [LICENSE](https://github.com/repat/laravel-validator-nric-fin/blob/master/LICENSE)

## Version

* Version 0.2

## Contact

### repat

* Homepage: [https://repat.de](https://repat.de)
* e-mail: repat@repat.de
* Twitter: [@repat123](https://twitter.com/repat123 "repat123 on twitter")

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=repat&url=https://github.com/repat/laravel-validator-nric-fin&title=laravel-validator-nric-fin&language=&tags=github&category=software)
