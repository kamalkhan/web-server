<?php

namespace Bhittani\WebServer;

use Exception;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

abstract class TestCase extends PHPUnitTestCase
{
    var $server;

    abstract function makeServer();

    function setUp()
    {
        $this->server = $this->makeServer();
    }

    function tearDown()
    {
        $this->server->stop();
    }

    function request($uri)
    {
        $url = rtrim($this->server->getUrl().'/'.ltrim($uri, '/'), '/');

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        try {
            if (! ($response = curl_exec($ch))) {
                throw new Exception(curl_error($ch));
            }
        } catch (Exception $e) {
            throw $e;
        } finally {
            curl_close($ch);
        }

        return $response;
    }
}
