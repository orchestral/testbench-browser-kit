# Changelog

This changelog references the relevant changes (bug and security fixes) done to `orchestra/testbench-browser-kit`.

## 3.9.1

Released: 2019-09-24

### Changes

* Update minimum support for Testbench v3.9.1+. ([v3.9.0...v3.9.1](https://github.com/orchestral/testbench/compare/v3.9.0...v3.9.1))
* Support test againsts PHP `7.4snapshot` build on Travis-CI.

## 3.9.0

Released: 2019-08-29

### Changes

* Update support for Laravel Framework v6.0.
* Update `laravel/browser-kit-testing` to `^5.1.3`.

### Removed

* Remove support for PHP 7.1.

## 3.8.0

Released: 2019-02-26

### Changes

* Update support for Laravel Framework v5.8.
* Update `laravel/browser-kit-testing` to `^5.1.1`.

## 3.7.2

Released: 2018-10-07

### Fixes

* Fixes dependencies constraint.

## 3.7.1

Released: 2018-10-07

### Changes

* Update minimum support for Testbench v3.7.3+.
    - Allows `Orchestra\Testbench\Database\MigrateProcessor` to accept both `int` exit code and `Illuminate\Foundation\Testing\PendingCommand` when running migration via artisan.
    - Update Laravel 5.7 skeleton.

## 3.7.0

Released: 2018-09-13

### Changes

* Update support for Laravel Framework v5.7.

## 3.6.1

Released: 2018-03-14

### Changes

* Add `Laravel\BrowserKitTesting\Concerns\InteractsWithExceptionHandling` to `Orchestra\Testbench\BrowserKit\TestCase`.

## 3.6.0

Released: 2018-02-10

### Changes

* Update support for Laravel Framework v5.6.
* Update `laravel/browser-kit-testing` to `~4.0`.

## 3.5.5

Released: 2018-02-28

### Changes

* Update `Orchestra\Testbench\BrowserKit\TestCase` to implements `Orchestra\Testbench\Concerns\Testing` trait.

## 3.5.4

Released: 2018-01-06

### Changes

* Update `Orchestra\Testbench\BrowserKit\TestCase` to match `Illuminate\Foundation\Testing\TestCase`.

## 3.5.3

Released: 2017-09-28

### Changes

* Add mockery expectations to the assertion count. ([@scrubmx](https://github.com/scrubmx))

## 3.5.2

Released: 2017-09-28

### Changes

* Return `$uses` from `Orchestra\Tesbench\BrowserKit\TestCase::setUpTraits()` method.

## 3.5.1

Released: 2017-09-05

### Changes

* Allow to use `Illuminate\Foundation\Testing\RefreshDatabase`.

## 3.5.0

Released: 2017-08-25

### Changes

* Update support for Laravel Framework v5.5.
* Update `laravel/browser-kit-testing` to `~2.0`.
