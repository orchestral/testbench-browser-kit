<?php

namespace Orchestra\Testbench\BrowserKit\Tests;

use Orchestra\Testbench\BrowserKit\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ApplicationTest extends TestCase
{
    #[Test]
    public function itUsesTestingAsEnvironment()
    {
        $this->assertEquals('testing', $this->app->environment());
    }
}
