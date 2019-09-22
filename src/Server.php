<?php

/*
 * This file is part of bhittani/web-server.
 *
 * (c) Kamal Khan <shout@bhittani.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Bhittani\WebServer;

use Symfony\Component\Process\Process;

abstract class Server implements Contract
{
    /**
     * Server URL.
     *
     * @var string
     */
    protected $url;

    /**
     * Server file.
     *
     * @var string
     */
    protected $file;

    /**
     * Server path.
     *
     * @var string
     */
    protected $path;

    /**
     * Server port.
     *
     * @var int
     */
    protected $port = 9001;

    /**
     * Server host.
     *
     * @var string
     */
    protected $host = 'localhost';

    /**
     * Milliseconds to wait after the process starts.
     *
     * @var int
     */
    protected $wait = 180;

    /**
     * Symfony process.
     *
     * @var Process
     */
    protected $process;

    /**
     * Construct the instance.
     *
     * @param string $file
     * @param string $path
     * @param string $host
     * @param int    $port
     * @param string $url
     */
    public function __construct($file, $path = null, $host = null, $port = null, $url = null)
    {
        $this->url($url ?: $this->url);
        $this->host($host ?: $this->host);
        $this->port($port ?: $this->port);
        $this->file($file = $file ?: $this->file);
        $this->path($path ?: $this->path ?: ($file ? dirname($file) : null));

        register_shutdown_function([$this, 'stop']);
    }

    /** Terminate the process. */
    public function __destruct()
    {
        $this->stop();
    }

    /**
     * Set the server file.
     *
     * @param string $file
     *
     * @return Contract
     */
    public function file($file)
    {
        $this->file = realpath($file);

        return $this;
    }

    /**
     * Set the server path.
     *
     * @param string $path
     *
     * @return Contract
     */
    public function path($path)
    {
        $this->path = realpath($path);

        return $this;
    }

    /**
     * Set the server host.
     *
     * @param string $host
     *
     * @return Contract
     */
    public function host($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Set the server port.
     *
     * @param int $port
     *
     * @return Contract
     */
    public function port($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Set the server url.
     *
     * @param string $url
     *
     * @return Contract
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @param null|int $wait
     */
    public function start($wait = null)
    {
        if (!$this->isRunning()) {
            $this->process = $this->makeProcess();

            $this->process->start();

            // Hackish way to ensure the server has started.
            usleep(($wait ?: $this->wait) * 1000);
        }
    }

    /** {@inheritdoc} */
    public function stop()
    {
        if ($this->isRunning()) {
            $this->process->stop();
        }

        $this->process = null;
    }

    /** {@inheritdoc} */
    public function isRunning()
    {
        return $this->process && $this->process->isRunning();
    }

    /** {@inheritdoc} */
    public function getUrl()
    {
        return $this->url ?: rtrim("http://{$this->host}:{$this->port}", ':');
    }

    /** {@inheritdoc} */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Make the Symfony process.
     *
     * @return Process
     */
    protected function makeProcess()
    {
        return new Process($this->getCommand(), $this->getCwd(), $this->getEnv());
    }

    /**
     * Get the process environment variables.
     *
     * @return array
     */
    protected function getEnv()
    {
        return [];
    }

    /**
     * Get the process current working directory.
     *
     * @return null|string
     */
    protected function getCwd()
    {
    }

    /**
     * Get the process command.
     *
     * @return string|array
     */
    abstract protected function getCommand();
}
