<?php

//namespace Psr\Log;

/**
 * Describes a logger-aware instance
 */
interface PSR3_Log_LoggerAwareInterface
{
    /**
     * Sets a logger instance on the object
     *
     * @param PSR3_Log_LoggerInterface $logger
     * @return null
     */
    public function setLogger(PSR3_Log_LoggerInterface $logger);
}
