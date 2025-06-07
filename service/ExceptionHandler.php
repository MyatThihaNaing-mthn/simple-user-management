<?php

class ExceptionHandler {
    public static function handleException(Throwable $exception) {
        error_log($exception->getMessage() . "\n" . $exception->getTraceAsString());
        
        http_response_code(500);
        include 'views/error/500.php';
        exit();
    }
}

set_exception_handler([ExceptionHandler::class, 'handleException']); 