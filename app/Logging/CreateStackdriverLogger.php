<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\PsrHandler;
use Google\Cloud\Logging\LoggingClient;

class CreateStackdriverLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logName = isset($config['logName']) ? $config['logName'] : 'app';
        $psrLogger = LoggingClient::psrBatchLogger($logName);
        $handler = new PsrHandler($psrLogger);
        $logger = new Logger($logName, [$handler]);
        return $logger;
    }
}