# Changelog for 8.x

This changelog references the relevant changes (bug and security fixes) done to `orchestra/testbench-browser-kit`.

## 8.3.0

Released: 2023-08-10

### Changes

* Update minimum support for Testbench v8.6.3+. ([v8.5.0...v8.6.3](https://github.com/orchestral/testbench/compare/v8.5.0...v8.6.3))

## 8.2.0

Released: 2023-05-02

### Changes

* Update minimum support for Testbench v8.5.0+. ([v8.3.0...v8.5.0](https://github.com/orchestral/testbench/compare/v8.3.0...v8.5.0))
* Support PHPUnit `10.1`.

## 8.1.0

Released: 2023-03-09

### Changes

* Update minimum support for Testbench v8.3.0+. ([v8.0.7...v8.3.0](https://github.com/orchestral/testbench/compare/v8.0.7...v8.3.0))
* Add `setUpTheTestEnvironmentTraitToBeIgnored()` method to determine `setup<Concern>` and `teardown<Concern>` with imported traits that should be used on a given trait.

## 8.0.1

Released: 2023-03-09

### Changes

* Update minimum support for Testbench v8.0.7+. ([v8.0.0...v8.0.7](https://github.com/orchestral/testbench/compare/v8.0.0...v8.0.7))

## 8.0.0

Released: 2023-02-14

### Changes

* Update support for Laravel Framework v10.
* Use `orchestra/testbench` version `^8.0`.
* Update `laravel/browser-kit-testing` to `^6.4 || ^7.0` (compatible with PHPUnit 9.6+ and 10+).
