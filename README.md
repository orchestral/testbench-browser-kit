Laravel Browser Kit Testing Helper for Packages Development
==============

[![Join the chat at https://gitter.im/orchestral/testbench](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/orchestral/testbench?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Testbench Component is a simple package that is supposed to help you write tests for your Laravel package, especially when there is routing involved.

[![Latest Stable Version](https://img.shields.io/github/release/orchestral/testbench-browser-kit.svg?style=flat-square)](https://packagist.org/packages/orchestra/testbench-browser-kit)
[![Total Downloads](https://img.shields.io/packagist/dt/orchestra/testbench-browser-kit.svg?style=flat-square)](https://packagist.org/packages/orchestra/testbench-browser-kit)
[![MIT License](https://img.shields.io/packagist/l/orchestra/testbench-browser-kit.svg?style=flat-square)](https://packagist.org/packages/orchestra/testbench-browser-kit)
[![Build Status](https://img.shields.io/travis/orchestral/testbench-browser-kit/3.4.svg?style=flat-square)](https://travis-ci.org/orchestral/testbench-browser-kit)
[![Coverage Status](https://img.shields.io/coveralls/orchestral/testbench-browser-kit/3.4.svg?style=flat-square)](https://coveralls.io/r/orchestral/testbench-browser-kit?branch=3.4)
[![Scrutinizer Quality Score](https://img.shields.io/scrutinizer/g/orchestral/testbench-browser-kit/3.4.svg?style=flat-square)](https://scrutinizer-ci.com/g/orchestral/testbench-browser-kit/)

* [Version Compatibility](#version-compatibility)
* [Installation](#installation)
* [Usage](#usage)

## Version Compatibility

 Laravel  | Testbench Browser Kit
:---------|:----------
 5.4.x    | 3.4.x@dev

## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require-dev": {
        "orchestra/testbench-browser-kit": "~3.4"
    }
}
```

And then run `composer install` from the terminal.

### Quick Installation

Above installation can also be simplify by using the following command:

    composer require --dev "orchestra/testbench-browser-kit=~3.4"

## Usage

Testbench Browser Kit added Browser Kit testing support for Laravel 5.4 and above. All you need to do is to replace `Orchestra\Testbench\TestCase` to `Orchestra\Testbench\BrowserKit\TestCase` and you should be good to go.
