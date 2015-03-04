<?php

//App::uses('AppController', '../Controller/Controller');

class AppExceptionHandler{
    public static function handle($error) {
        echo 'Error Occured! ' . $error->getMessage();
        $errorCode = $error->getCode();
        if ($errorCode == 404) 
        {
            header("HTTP/1.0 404 Not Found");
        } 
        elseif ($errorCode == 500) 
        {
            header("HTTP/1.0 500 Internal Server Error");
        }
    }
}

?>