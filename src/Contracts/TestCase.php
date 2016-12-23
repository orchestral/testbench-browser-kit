<?php

namespace Orchestra\Testbench\BrowserKit\Contracts;

use Orchestra\Testbench\Contracts\TestCase as TestCaseContract;

interface TestCase extends TestCaseContract
{
    /**
     * Assert that the session has a given list of values.
     *
     * @param  array $bindings
     *
     * @return void
     */
    public function assertSessionHasAll(array $bindings);

    /**
     * Call a controller action and return the Response.
     *
     * @param  string $method
     * @param  string $action
     * @param  array $wildcards
     * @param  array $parameters
     * @param  array $files
     * @param  array $server
     * @param  string $content
     * @param  bool $changeHistory
     *
     * @return \Illuminate\Http\Response
     */
    public function action($method, $action, $wildcards = [], $parameters = [], $files = [], $server = [], $content = null, $changeHistory = true);

    /**
     * Assert that the session has old input.
     *
     * @return void
     */
    public function assertHasOldInput();

    /**
     * Assert that the response view has a given piece of bound data.
     *
     * @param  string|array $key
     * @param  mixed $value
     *
     * @return void
     */
    public function assertViewHas($key, $value = null);

    /**
     * Assert that the client response has a given code.
     *
     * @param  int $code
     *
     * @return void
     */
    public function assertResponseStatus($code);

    /**
     * Call a named route and return the Response.
     *
     * @param  string $method
     * @param  string $name
     * @param  array $routeParameters
     * @param  array $parameters
     * @param  array $files
     * @param  array $server
     * @param  string $content
     * @param  bool $changeHistory
     *
     * @return \Illuminate\Http\Response
     */
    public function route($method, $name, $routeParameters = [], $parameters = [], $files = [], $server = [], $content = null, $changeHistory = true);

    /**
     * Assert that the session has a given list of values.
     *
     * @param  string|array $key
     * @param  mixed $value
     *
     * @return void
     */
    public function assertSessionHas($key, $value = null);

    /**
     * Assert whether the client was redirected to a given URI.
     *
     * @param  string $uri
     * @param  array $with
     *
     * @return void
     */
    public function assertRedirectedTo($uri, $with = []);

    /**
     * Set the session to the given array.
     *
     * @param  array $data
     *
     * @return void
     */
    public function session(array $data);

    /**
     * Assert that the client response has an OK status code.
     *
     * @return void
     */
    public function assertResponseOk();

    /**
     * Assert whether the client was redirected to a given action.
     *
     * @param  string $name
     * @param  array $parameters
     * @param  array $with
     *
     * @return void
     */
    public function assertRedirectedToAction($name, $parameters = [], $with = []);

    /**
     * Assert that the session has errors bound.
     *
     * @param  string|array $bindings
     * @param  mixed $format
     *
     * @return void
     */
    public function assertSessionHasErrors($bindings = [], $format = null);

    /**
     * Assert that the response view is missing a piece of bound data.
     *
     * @param  string $key
     *
     * @return void
     */
    public function assertViewMissing($key);

    /**
     * Call the given HTTPS URI and return the Response.
     *
     * @param  string $method
     * @param  string $uri
     * @param  array $parameters
     * @param  array $files
     * @param  array $server
     * @param  string $content
     * @param  bool $changeHistory
     *
     * @return \Illuminate\Http\Response
     */
    public function callSecure($method, $uri, $parameters = [], $files = [], $server = [], $content = null, $changeHistory = true);

    /**
     * Assert whether the client was redirected to a given route.
     *
     * @param  string $name
     * @param  array $parameters
     * @param  array $with
     *
     * @return void
     */
    public function assertRedirectedToRoute($name, $parameters = [], $with = []);

    /**
     * Flush all of the current session data.
     *
     * @return void
     */
    public function flushSession();

    /**
     * Assert that the view has a given list of bound data.
     *
     * @param  array $bindings
     *
     * @return void
     */
    public function assertViewHasAll(array $bindings);
}
