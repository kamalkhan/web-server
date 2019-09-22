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

class Fake extends Server
{
    /**
     * Server port.
     *
     * @var int
     */
    protected $port;

    /**
     * Running flag.
     *
     * @var bool
     */
    protected $running = false;

    /** {@inheritdoc} */
    public function start($wait = null)
    {
        $this->running = true;
    }

    /** {@inheritdoc} */
    public function stop()
    {
        $this->running = false;
    }

    /** {@inheritdoc} */
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
