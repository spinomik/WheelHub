<?php

namespace WheelHubApi\Service;

class Logger
{
    private $logFile;

    public function __construct($logFile = 'logs.txt')
    {
        $path = dirname(__DIR__) . '/';
        $this->logFile = $path . $logFile;
    }

    public function log($data)
    {
        $logData = print_r($data, true);
        $logEntry = date('Y-m-d H:i:s') . " - " . $logData . PHP_EOL;

        file_put_contents($this->logFile, $logEntry, FILE_APPEND);
    }
}
