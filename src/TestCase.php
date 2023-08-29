<?php

namespace Orchestra\Testbench\BrowserKit;

use Illuminate\Foundation\Testing;
use Illuminate\Support\Str;
use Laravel\BrowserKitTesting\Concerns as BrowserKitTesting;
use Orchestra\Testbench\Concerns;
use PHPUnit\Framework\TestCase as PHPUnit;

abstract class TestCase extends PHPUnit implements Contracts\TestCase
{
    use BrowserKitTesting\ImpersonatesUsers,
        BrowserKitTesting\InteractsWithAuthentication,
        BrowserKitTesting\InteractsWithConsole,
        BrowserKitTesting\InteractsWithContainer,
        BrowserKitTesting\InteractsWithDatabase,
        BrowserKitTesting\InteractsWithExceptionHandling,
        BrowserKitTesting\InteractsWithSession,
        BrowserKitTesting\MakesHttpRequests,
        Concerns\Testing;

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
    protected function setUp(): void
    {
        $this->setUpTheTestEnvironment();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    protected function tearDown(): void
    {
        $this->tearDownTheTestEnvironment();
    }

    /**
     * Boot the testing helper traits.
     *
     * @return array<string, string>
     */
    protected function setUpTraits()
    {
        return $this->setUpTheTestEnvironmentTraits(static::$cachedTestCaseUses);
    }

    /**
     * Determine trait should be ignored from being autoloaded.
     *
     * @param  class-string  $use
     * @return bool
     */
    protected function setUpTheTestEnvironmentTraitToBeIgnored(string $use): bool
    {
        return Str::startsWith($use, [
            Testing\RefreshDatabase::class,
            Testing\DatabaseMigrations::class,
            Testing\DatabaseTransactions::class,
            Testing\WithoutMiddleware::class,
            Testing\WithoutEvents::class,
            Testing\WithFaker::class,
            BrowserKitTesting\ImpersonatesUsers::class,
            BrowserKitTesting\InteractsWithAuthentication::class,
            BrowserKitTesting\InteractsWithConsole::class,
            BrowserKitTesting\InteractsWithContainer::class,
            BrowserKitTesting\InteractsWithDatabase::class,
            BrowserKitTesting\InteractsWithExceptionHandling::class,
            BrowserKitTesting\InteractsWithSession::class,
            Concerns\CreatesApplication::class,
            Concerns\Database\HandlesConnections::class,
            Concerns\HandlesAnnotations::class,
            Concerns\HandlesDatabases::class,
            Concerns\HandlesRoutes::class,
            Concerns\InteractsWithMigrations::class,
            Concerns\InteractsWithPHPUnit::class,
            Concerns\InteractsWithWorkbench::class,
            Concerns\Testing::class,
            Concerns\WithFactories::class,
            Concerns\WithLaravelMigrations::class,
        ]);
    }

    /**
     * Refresh the application instance.
     *
     * @return void
     */
    protected function refreshApplication()
    {
        $_ENV['APP_ENV'] = 'testing';

        $this->app = $this->createApplication();
    }

    /**
     * Prepare the testing environment before the running the test case.
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        static::setupBeforeClassUsingPHPUnit();
        static::setupBeforeClassUsingWorkbench();
    }

    /**
     * Clean up the testing environment before the next test case.
     *
     * @return void
     */
    public static function tearDownAfterClass(): void
    {
        static::teardownAfterClassUsingWorkbench();
        static::teardownAfterClassUsingPHPUnit();
    }
}
