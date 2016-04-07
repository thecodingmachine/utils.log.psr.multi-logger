<?php

/*
 * Copyright (c) 2013-2016 David Negrier
 *
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Utils\Log\Psr;

use Psr\Log\LoggerInterface;
use Psr\Log\AbstractLogger;

/**
 * A logger class that aggregates several PSR-3 compliant loggers together.
 */
class MultiLogger extends AbstractLogger
{
    /**
     * @var LoggerInterface[]
     */
    private $loggers;

    /**
     * @param LoggerInterface[] $loggers Array of loggers to be called
     */
    public function __construct(array $loggers = array())
    {
        $this->loggers = $loggers;
    }

    /**
     * Adds a logger to the list of loggers.
     *
     * @param LoggerInterface $logger
     */
    public function addLogger(LoggerInterface $logger)
    {
        $this->loggers[] = $logger;
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     */
    public function log($level, $message, array $context = array())
    {
        foreach ($this->loggers as $logger) {
            /* @var $logger LoggerInterface */
            $logger->log($level, $message, $context);
        }
    }
}
