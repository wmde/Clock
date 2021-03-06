# Clock

[![Build Status](https://travis-ci.com/wmde/Clock.svg?branch=master)](https://travis-ci.com/wmde/Clock)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wmde/Clock/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wmde/Clock/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/wmde/Clock/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/wmde/Clock/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/wmde/clock/version.png)](https://packagist.org/packages/wmde/clock)
[![Download count](https://poser.pugx.org/wmde/clock/d/total.png)](https://packagist.org/packages/wmde/clock)

A simple interface to get the current time without binding to global system resources plus trivial implementations that facilitate testing.

## Clock Usage

```php
function yourCode(Clock $clock) {
    $time = $clock->now(); // Returns DateTimeImmutable. No global access and easily testable
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

To use the Clock library in your project, simply add a dependency on wmde/clock
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

For development you need to have Docker and Docker-compose installed. Local PHP and Composer are not needed.

    sudo apt-get install docker docker-compose

### Running Composer

To pull in the project dependencies via Composer, run:

    make composer install

You can run other Composer commands via `make run`, but at present this does not support argument flags.
If you need to execute such a command, you can do so in this format:

    docker run --rm --interactive --tty --volume $PWD:/app -w /app\
     --volume ~/.composer:/composer --user $(id -u):$(id -g) composer composer install --no-scripts

Where `composer install --no-scripts` is the command being run.

### Running the CI checks

To run all CI checks, which includes PHPUnit tests, PHPCS style checks and coverage tag validation, run:

    make
    
### Running the tests

To run just the PHPUnit tests run

    make test

To run only a subset of PHPUnit tests or otherwise pass flags to PHPUnit, run

    docker-compose run --rm app ./vendor/bin/phpunit --filter SomeClassNameOrFilter

## Release notes

### 1.0.0 (2018-09-26)

Initial release with `Clock`, `SystemClock`, `StubClock`, `CollectionClock` and `IncrementingClock`
