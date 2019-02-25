Laravel Browser Kit Testing Helper for Packages Development
==============

[![Join the chat at https://gitter.im/orchestral/testbench](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/orchestral/testbench?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Testbench Component is a simple package that is supposed to help you write tests for your Laravel package, especially when there is routing involved.

[![Build Status](https://travis-ci.org/orchestral/testbench-browser-kit.svg?branch=3.7)](https://travis-ci.org/orchestral/testbench-browser-kit)
[![Latest Stable Version](https://poser.pugx.org/orchestra/testbench-browser-kit/v/stable)](https://packagist.org/packages/orchestra/testbench-browser-kit)
[![Total Downloads](https://poser.pugx.org/orchestra/testbench-browser-kit/downloads)](https://packagist.org/packages/orchestra/testbench-browser-kit)
[![Latest Unstable Version](https://poser.pugx.org/orchestra/testbench-browser-kit/v/unstable)](https://packagist.org/packages/orchestra/testbench-browser-kit)
[![License](https://poser.pugx.org/orchestra/testbench-browser-kit/license)](https://packagist.org/packages/orchestra/testbench-browser-kit)

* [Version Compatibility](#version-compatibility)
* [Installation](#installation)
* [Usage](#usage)
* [Changelog](https://github.com/orchestral/testbench-browser-kit/releases)

## Version Compatibility

 Laravel  | Testbench Browser Kit
:---------|:----------
 5.5.x    | 3.5.x
 5.6.x    | 3.6.x
 5.7.x.   | 3.7.x

## Installation

To install through composer, simply put the following in your `composer.json` file:

```json
{
    "require-dev": {
        "orchestra/testbench-browser-kit": "^3.1"
    }
}
```

And then run `composer install` from the terminal.

### Quick Installation

Above installation can also be simplify by using the following command:

    composer require --dev "orchestra/testbench-browser-kit=^3.1"

## Usage

Testbench Browser Kit added Browser Kit testing support for Laravel 5.4 and above. All you need to do is to replace `Orchestra\Testbench\TestCase` to `Orchestra\Testbench\BrowserKit\TestCase` and you should be good to go.
