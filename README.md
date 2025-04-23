# Clock

A simple interface to get the current time without binding to global system resources, plus configurable implementations that you can use in your unit tests.

## Clock Usage

```php
function yourCode(Clock $clock) {
    $time = $clock->now(); // Returns DateTimeImmutable. More testable than initializing a new instance
}
```

Clock interface:

```php
interface Clock {
    public function now(): \DateTimeImmutable;
}
```

Provided implementations:

* `SystemClock`: Uses global system resources
* `StubClock`: Returns value provided in the constructor. Useful in tests
* `CollectionClock`: Returns specified values sequentially. Useful in tests
* `IncrementingClock`: Returns an incremented starting time infinitely. Useful in tests

## Installation

To use the Clock library in your project, add a dependency on wmde/clock
to your project's `composer.json` file. Here is a minimal example of a `composer.json`
file that just defines a dependency on Clock 1.x:

```json
{
    "require": {
        "wmde/clock": "~1.0"
    }
}
```

## Development

For development you need to have Docker and the `docker compose` plugin installed. Local PHP and Composer are not needed.

### Installing the development dependencies

To pull in the project dependencies (PHPUnit, PHPStan, etc.) via Composer, run:

    make install-php

To update the dependencies, run

    make update-php

### Running the CI checks

To run all CI checks, which includes PHPUnit tests, PHPCS style checks and coverage tag validation, run:

    make
    
### Running the tests

To run only the PHPUnit tests run

    make test

To run only a subset of PHPUnit tests or otherwise pass flags to PHPUnit, run

    docker-compose run --rm app ./vendor/bin/phpunit --filter SomeClassNameOrFilter

## Release notes

### 2.0.0 (2025-04-22)

Updated dev dependencies and increased PHP version requirements (to exert
some pressure to update PHP).

### 1.0.0 (2018-09-26)

Initial release with `Clock`, `SystemClock`, `StubClock`, `CollectionClock` and `IncrementingClock`
