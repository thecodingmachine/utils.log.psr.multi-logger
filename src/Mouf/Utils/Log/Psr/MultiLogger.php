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
    /** @var LoggerInterface[] */
    private array $loggers;

    /**
     * @param LoggerInterface[] $loggers Array of loggers to be called
     */
    public function __construct(array $loggers = [])
    {
        $this->loggers = $loggers;
    }

    /**
     * Adds a logger to the list of loggers.
     */
    public function addLogger(LoggerInterface $logger): void
    {
        $this->loggers[] = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message, $context);
        }
    }
}
