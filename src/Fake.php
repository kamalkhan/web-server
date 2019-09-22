<?php

namespace Bhittani\WebServer;

class Fake extends Server
{
    /**
     * Server port.
     *
     * @var integer
     */
    protected $port;

    /**
     * Running flag.
     *
     * @var bool
     */
    protected $running = false;

    /** @inheritDoc */
    public function start($wait = null)
    {
        $this->running = true;
    }

    /** @inheritDoc */
    public function stop()
    {
        $this->running = false;
    }

    /** @inheritDoc */
    public function isRunning()
    {
        return $this->running;
    }

    /** {@inheritdoc} */
    protected function getCommand()
    {
        return [];
    }
}
