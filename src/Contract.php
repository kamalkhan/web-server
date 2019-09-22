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

interface Contract
{
    /** Start the server. */
    public function start();

    /** Stop the server. */
    public function stop();

    /**
     * Check if the server is running or not.
     *
     * @return bool
     */
    public function isRunning();

    /**
     * Get the path to the server.
     *
     * @return string
     */
    public function getPath();

    /**
     * Get the url to access the server.
     *
     * @return string
     */
    public function getUrl();
}
