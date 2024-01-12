<?php

namespace Orchestra\Testbench\BrowserKit;

use Illuminate\Foundation\Testing;
use Laravel\BrowserKitTesting\Concerns as BrowserKitTesting;
use Orchestra\Testbench\Concerns;
use Orchestra\Testbench\Pest;
use Orchestra\Testbench\PHPUnit\TestCase as PHPUnit;

abstract class TestCase extends PHPUnit implements Contracts\TestCase
{
    use BrowserKitTesting\ImpersonatesUsers;
    use BrowserKitTesting\InteractsWithAuthentication;
    use BrowserKitTesting\InteractsWithConsole;
    use BrowserKitTesting\InteractsWithContainer;
    use BrowserKitTesting\InteractsWithDatabase;
    use BrowserKitTesting\InteractsWithExceptionHandling;
    use BrowserKitTesting\InteractsWithSession;
    use BrowserKitTesting\MakesHttpRequests;
    use Concerns\Testing;

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
    #[\Override]
    protected function setUp(): void
    {
        $this->setUpTheTestEnvironment();
    }

    /**
     * Clean up the testing environment before the next test.
     *
     * @return void
     */
    #[\Override]
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
        return \in_array($use, [
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
    #[\Override]
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
    #[\Override]
    public static function setUpBeforeClass(): void
    {
        static::setUpBeforeClassUsingPHPUnit();

        /** @phpstan-ignore-next-line */
        if (static::usesTestingConcern(Pest\WithPest::class)) {
            static::setUpBeforeClassUsingPest(); // @phpstan-ignore-line
        }

        static::setUpBeforeClassUsingTestCase();
        static::setUpBeforeClassUsingWorkbench();
    }

    /**
     * Clean up the testing environment before the next test case.
     *
     * @return void
     */
    #[\Override]
    public static function tearDownAfterClass(): void
    {
        static::tearDownAfterClassUsingWorkbench();
        static::tearDownAfterClassUsingTestCase();

        /** @phpstan-ignore-next-line */
        if (static::usesTestingConcern(Pest\WithPest::class)) {
            static::tearDownAfterClassUsingPest(); // @phpstan-ignore-line
        }

        static::tearDownAfterClassUsingPHPUnit();
    }
}
