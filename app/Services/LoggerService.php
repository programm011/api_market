<?php

namespace App\Services;

use App\Jobs\LoggerJob;

class LoggerService
{
    public function log($response = [], $status = 200, $message = '')
    {
        LoggerJob::dispatchAfterResponse($response, $status, $message);
    }
}
