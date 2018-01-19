<?php

namespace Orchestra\Testbench\BrowserKit;

use Mockery;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Facade;
use Illuminate\Database\Eloquent\Model;
use Orchestra\Testbench\Concerns\Testing;
use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\Traits\WithFactories;
use Illuminate\Console\Application as Artisan;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\Traits\CreatesApplication;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Orchestra\Testbench\Traits\WithLaravelMigrations;
use Orchestra\Testbench\Traits\WithLoadMigrationsFrom;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\BrowserKitTesting\Concerns\ImpersonatesUsers;
use Laravel\BrowserKitTesting\Concerns\MakesHttpRequests;
use Laravel\BrowserKitTesting\Concerns\InteractsWithConsole;
use Laravel\BrowserKitTesting\Concerns\InteractsWithSession;
use Laravel\BrowserKitTesting\Concerns\InteractsWithDatabase;
use Laravel\BrowserKitTesting\Concerns\InteractsWithContainer;
use Laravel\BrowserKitTesting\Concerns\MocksApplicationServices;
use Laravel\BrowserKitTesting\Concerns\InteractsWithAuthentication;
use Orchestra\Testbench\BrowserKit\Contracts\TestCase as TestCaseContract;

abstract class TestCase extends BaseTestCase implements TestCaseContract
{
    use Testing,
        ImpersonatesUsers,
        InteractsWithAuthentication,
        InteractsWithContainer,
        InteractsWithConsole,
        InteractsWithDatabase,
        InteractsWithSession,
        MakesHttpRequests,
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
     * Boot the testing helper traits.
     *
     * @return array
     */
    protected function setUpTraits()
    {
        return $this->setUpTheTestEnvironmentTraits();
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
