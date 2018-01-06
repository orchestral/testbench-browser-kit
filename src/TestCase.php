<?php

namespace Orchestra\Testbench\BrowserKit;

use Orchestra\Testbench\Concerns\Testing;
use PHPUnit\Framework\TestCase as PHPUnit;
use Laravel\BrowserKitTesting\Concerns\ImpersonatesUsers;
use Laravel\BrowserKitTesting\Concerns\MakesHttpRequests;
use Laravel\BrowserKitTesting\Concerns\InteractsWithConsole;
use Laravel\BrowserKitTesting\Concerns\InteractsWithSession;
use Laravel\BrowserKitTesting\Concerns\InteractsWithDatabase;
use Laravel\BrowserKitTesting\Concerns\InteractsWithContainer;
use Laravel\BrowserKitTesting\Concerns\MocksApplicationServices;
use Laravel\BrowserKitTesting\Concerns\InteractsWithAuthentication;

abstract class TestCase extends PHPUnit implements Contracts\TestCase
{
    use Testing,
        InteractsWithContainer,
        MakesHttpRequests,
        ImpersonatesUsers,
        InteractsWithAuthentication,
        InteractsWithConsole,
        InteractsWithDatabase,
        InteractsWithSession,
        MocksApplicationServices;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->setUpTheTestEnvironment();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown()
    {
        $this->tearDownTheTestEnvironment();
    }

    /**
     * Refresh the application instance.
     *
     * @return void
     */
    protected function refreshApplication()
    {
        putenv('APP_ENV=testing');

        $this->app = $this->createApplication();
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application   $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Define your environment setup.
    }
}
