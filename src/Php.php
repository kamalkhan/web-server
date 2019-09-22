<?php

namespace Bhittani\WebServer;

use Symfony\Component\Process\PhpExecutableFinder;

class Php extends Server
{
    /** @inheritDoc */
    protected function getCommand()
    {
        return [
            $this->getPhpBinary(),
            '-S',
            "{$this->host}:{$this->port}",
            '-t',
            $this->path,
            $this->file,
        ];
    }

    /**
     * Get the php binary.
     *
     * @return string
     */
    protected function getPhpBinary()
    {
        return (new PhpExecutableFinder)->find(false);
    }
}
