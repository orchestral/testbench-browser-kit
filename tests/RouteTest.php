<?php

namespace Orchestra\Testbench\BrowserKit\Tests;

use Illuminate\Routing\Router;
use Orchestra\Testbench\BrowserKit\TestCase;

class RouteTest extends TestCase
{
    /**
     * Define environment setup.
     *
     * @param  Illuminate\Foundation\Application    $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['router']->get('hello', ['as' => 'hi', 'uses' => function () {
            return 'hello world';
        }]);

        $app['router']->get('goodbye', function () {
            return 'goodbye world';
        })->name('bye');

        $app['router']->group(['prefix' => 'boss'], function (Router $router) {
            $router->get('hello', ['as' => 'boss.hi', 'uses' => function () {
                return 'hello boss';
            }]);

            $router->get('goodbye', function () {
                return 'goodbye boss';
            })->name('boss.bye');
        });

        $app['router']->resource('foo', 'Orchestra\Testbench\BrowserKit\Tests\Stubs\Controller');
    }

    /** @test */
    public function can_send_request()
    {
        $crawler = $this->call('GET', 'hello');

        $this->assertEquals('hello world', $crawler->getContent());

        $crawler = $this->call('GET', 'goodbye');

        $this->assertEquals('goodbye world', $crawler->getContent());
    }

    /** @test */
    public function can_send_request_via_named_route()
    {
        $crawler = $this->route('GET', 'hi');

        $this->assertEquals('hello world', $crawler->getContent());

        $crawler = $this->route('GET', 'bye');

        $this->assertEquals('goodbye world', $crawler->getContent());
    }

    /** @test */
    public function can_send_request_with_prefix()
    {
        $crawler = $this->call('GET', 'boss/hello');

        $this->assertEquals('hello boss', $crawler->getContent());

        $crawler = $this->route('GET', 'boss.bye');

        $this->assertEquals('goodbye boss', $crawler->getContent());
    }

    /** @test */
    public function can_send_request_with_prefix_via_named_route()
    {
        $crawler = $this->route('GET', 'boss.hi');

        $this->assertEquals('hello boss', $crawler->getContent());

        $crawler = $this->call('GET', 'boss/goodbye');

        $this->assertEquals('goodbye boss', $crawler->getContent());
    }

    /** @test */
    public function can_send_request_using_action_helper()
    {
        $crawler = $this->action('GET', 'Orchestra\Testbench\BrowserKit\Tests\Stubs\Controller@index');

        $this->assertResponseOk();
        $this->assertEquals('Controller@index', $crawler->getContent());
    }

    /** @test */
    public function can_send_request_using_call_helper()
    {
        $crawler = $this->call('GET', 'foo');

        $this->assertResponseOk();
        $this->assertEquals('Controller@index', $crawler->getContent());
    }

    /** @test */
    public function can_send_request_using_post_and_return_json()
    {
        $crawler = $this->post('foo', [
            'content' => 'First comment',
        ])->seeJson([
            'content' => 'First comment',
        ]);
    }
}
