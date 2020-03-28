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

use Symfony\Component\Process\PhpExecutableFinder;

class Php extends Server
{
    /** {@inheritdoc} */
    protected function getCommand()
    {
        return [
            $this->getPhpBinary(),
            '-S',
            "{$this->host}:{$this->port}",
            '-t',
            $this->path,
            __DIR__.'/../servers/server.php',
        ];
    }

    /** {@inheritdoc} */
    protected function getEnv()
    {
        return [
            'PHP_SERVER_FILE' => $this->file,
            'PHP_SERVER_PATH' => $this->path,
        ];
    }

    /** {@inheritdoc} */
    protected function getCwd()
    {
        return $this->path;
    }

    /**
     * Get the php binary.
     *
     * @return string
     */
    protected function getPhpBinary()
    {
        return (new PhpExecutableFinder())->find(false);
    }
}
