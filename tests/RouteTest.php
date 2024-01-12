<?php

namespace Orchestra\Testbench\BrowserKit\Tests;

use Illuminate\Routing\Router;
use Orchestra\Testbench\BrowserKit\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Workbench\App\Http\Controllers\Controller;

class RouteTest extends TestCase
{
    /**
     * Define routes setup.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function defineRoutes($router)
    {
        $router->get('hello', ['as' => 'hi', 'uses' => function () {
            return 'hello world';
        }]);

        $router->get('goodbye', function () {
            return 'goodbye world';
        })->name('bye');

        $router->group(['prefix' => 'boss'], function (Router $router) {
            $router->get('hello', ['as' => 'boss.hi', 'uses' => function () {
                return 'hello boss';
            }]);

            $router->get('goodbye', function () {
                return 'goodbye boss';
            })->name('boss.bye');
        });

        $router->resource('foo', Controller::class);
    }

    #[Test]
    public function canSendRequest()
    {
        $crawler = $this->call('GET', 'hello');

        $this->assertEquals('hello world', $crawler->getContent());

        $crawler = $this->call('GET', 'goodbye');

        $this->assertEquals('goodbye world', $crawler->getContent());
    }

    #[Test]
    public function canSendRequestViaNamedRoute()
    {
        $crawler = $this->route('GET', 'hi');

        $this->assertEquals('hello world', $crawler->getContent());

        $crawler = $this->route('GET', 'bye');

        $this->assertEquals('goodbye world', $crawler->getContent());
    }

    #[Test]
    public function canSendRequestWithPrefix()
    {
        $crawler = $this->call('GET', 'boss/hello');

        $this->assertEquals('hello boss', $crawler->getContent());

        $crawler = $this->route('GET', 'boss.bye');

        $this->assertEquals('goodbye boss', $crawler->getContent());
    }

    #[Test]
    public function canSendRequestWithPrefixViaNamedRoute()
    {
        $crawler = $this->route('GET', 'boss.hi');

        $this->assertEquals('hello boss', $crawler->getContent());

        $crawler = $this->call('GET', 'boss/goodbye');

        $this->assertEquals('goodbye boss', $crawler->getContent());
    }

    #[Test]
    public function canSendRequestUsingActionHelper()
    {
        $crawler = $this->action('GET', sprintf('%s@index', Controller::class));

        $this->assertResponseOk();
        $this->assertEquals('Controller@index', $crawler->getContent());
    }

    #[Test]
    public function canSendRequestUsingCallHelper()
    {
        $crawler = $this->call('GET', 'foo');

        $this->assertResponseOk();
        $this->assertEquals('Controller@index', $crawler->getContent());
    }

    #[Test]
    public function canSendRequestUsingPostAndReturnJson()
    {
        $crawler = $this->post('foo', [
            'content' => 'First comment',
        ])->seeJson([
            'content' => 'First comment',
        ]);
    }
}
