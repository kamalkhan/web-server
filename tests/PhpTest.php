<?php

namespace Bhittani\WebServer;

class PhpTest extends TestCase
{
    function makeServer()
    {
        return new Php(__DIR__.'/fixtures/php/index.php');
    }

    /** @test */
    function it_starts_a_php_web_server()
    {
        $this->server->start();

        $response = $this->request('/page');

        $this->assertEquals('/page', $response);
    }

    /** @test */
    function it_can_tell_whether_the_server_is_running_or_not()
    {
        $this->assertFalse($this->server->isRunning());

        $this->server->start();

        $this->assertTrue($this->server->isRunning());

        $this->server->stop();

        $this->assertFalse($this->server->isRunning());
    }

    /** @test */
    function it_provides_the_url_to_the_server()
    {
        $url = $this->server->getUrl();

        $this->assertEquals('http://localhost:9001', $url);
    }

    /** @test */
    function it_provides_the_path_to_the_server()
    {
        $path = $this->server->getPath();

        $this->assertEquals(__DIR__.'/fixtures/php', $path);
    }
}
