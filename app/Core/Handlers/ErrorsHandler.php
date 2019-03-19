<?php
namespace Core\Handlers;

class ErrorsHandler
{
    const LOGS_PATH = BASE_PATH.DIRECTORY_SEPARATOR.'/logs/';

    function __construct()
    {
        set_error_handler([$this, 'errorHandler']);
        register_shutdown_function([$this, 'shutdownHandler']);
    }

    function errorHandler($error_level, $error_message, $error_file, $error_line, $error_context)
    {
        $error = "lvl: " . $error_level . " | msg:" . $error_message . " | file:" . $error_file . " | ln:" . $error_line;
        switch ($error_level) {
            case E_ERROR:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_PARSE:
                self::log($error, "fatal");
                break;
            case E_USER_ERROR:
            case E_RECOVERABLE_ERROR:
                self::log($error, "error");
                break;
            case E_WARNING:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
            case E_USER_WARNING:
                $this->log($error, "warn");
                break;
            case E_NOTICE:
            case E_USER_NOTICE:
                $this->log($error, "info");
                break;
            case E_STRICT:
                $this->log($error, "debug");
                break;
            default:
                $this->log($error, "warn");
        }
    }

    function shutdownHandler()
    {
        $lasterror = error_get_last();
        switch ($lasterror['type'])
        {
            case E_ERROR:
            case E_CORE_ERROR:
            case E_COMPILE_ERROR:
            case E_USER_ERROR:
            case E_RECOVERABLE_ERROR:
            case E_CORE_WARNING:
            case E_COMPILE_WARNING:
            case E_PARSE:
                $error = "[SHUTDOWN] lvl:" . $lasterror['type'] . " | msg:" . $lasterror['message'] . " | file:" . $lasterror['file'] . " | ln:" . $lasterror['line'];
                $this->log($error, "fatal");
        }
    }

    public function log($error, $errlvl)
    {
        $error = $errlvl.' '. $error;
        $this->storeErrorMessage($error);
        $this->showErrorMessage($error);
        return;
    }

    protected function showErrorMessage($error)
    {
        echo $error;
    }

    protected function storeErrorMessage($error)
    {
        FileHandler::writeToFile(self::LOGS_PATH.'error.log', "\n[".date("Y-m-d H:i:s").'] '.$error);
    }

}