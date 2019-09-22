<?php

namespace Bhittani\WebServer;

class FakeTest extends TestCase
{
    function makeServer()
    {
        return new Fake(__FILE__);
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

        $this->assertEquals('http://localhost', $url);
    }

    /** @test */
    function it_provides_the_path_to_the_server()
    {
        $path = $this->server->getPath();

        $this->assertEquals(__DIR__, $path);
    }
}
