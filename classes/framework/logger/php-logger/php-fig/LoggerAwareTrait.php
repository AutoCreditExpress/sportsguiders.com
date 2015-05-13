<?php

//namespace Psr\Log;

/**
 * Basic Implementation of LoggerAwareInterface.
 */
//trait LoggerAwareTrait
abstract class PSR3_Log_LoggerAwareTrait
{
    /** @var LoggerInterface */
    protected $logger;

    /**
     * Sets a logger.
     * 
     * @param PSR3_Log_LoggerInterface $logger
     */
    public function setLogger(PSR3_Log_LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
