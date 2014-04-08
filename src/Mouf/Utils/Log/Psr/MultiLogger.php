<?php
/*
 * Copyright (c) 2013 David Negrier
 * 
 * See the file LICENSE.txt for copying permission.
 */

namespace Mouf\Utils\Log\Psr;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Psr\Log\AbstractLogger;

/**
 * A logger class that writes messages into the php error_log.
 */
class MultiLogger extends AbstractLogger {
	
	/**
	 * @var LoggerInterface[] $loggers
	 */
	private $loggers;
	
	/**
	 * @param LoggerInterface[] $loggers
	 */
	public function __construct($loggers){
		$this->loggers = $loggers;
	}

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array()) {
    	foreach ($this->loggers as $logger){
    		/* @var $logger LoggerInterface */
    		$logger->log($level, $message, $context);
    	}
    }
    
}

?>