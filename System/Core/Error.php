<?php 

namespace System\Core;

/**
 * Error and exception handler
 */
class Error {
    
    /**
     * Error handler.
     *
     * @param int $level  
     * @param string $message  
     * @param string $file  
     * @param int $line  
     *
     * @return void
     */
    public static function errorHandler($level, $message, $file, $line){
        if (error_reporting() !== 0){
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     *
     * @param Exception $exception
     *
     * @return void
     */
    public static function exceptionHandler($exception){

        $code = $exception->getCode();
        if ($code != 404){
            $code = 500;
        }
        http_response_code($code);

        if (\App\Config::SHOW_ERROR ){

        echo "<h1> Fatal error </h1>";
        echo "<p> Uncaught exception: '" . get_class($exception)."' </p>";
        echo "<p> Message: '" . $exception->getMessage()."' </p>";
        echo "<p> Stack trace:<pre>". $exception->getTraceAsString()."</pre></p>";
        echo "<p> Throw in: '" . $exception->getFile()."'on line ". $exception->getLine()."</p>";

        } else{

            $log = dirname(dirname(__DIR__)).'/App/logs/'.date('Y-m-d'). '.txt';
            ini_set('error_log', $log);

            $message = "Uncaught exception:  '" . get_class($exception)."'";
            $message .= "with message '" . $exception->getMessage()."'";
            $message .= "\n Stack trace: '" . $exception->getTraceAsString()."'";
            $message .= "\n Throw in: '" . $exception->getFile()."'on line ". $exception->getLine()."'";

            error_log($message);

            View::renderTemplate("$code.html");
        }
    }
}