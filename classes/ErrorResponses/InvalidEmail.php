<?php
// require_once __DIR__ . '/ErrorResponse.php';

class InvalidEmail extends Exception
{ 
    public function __construct(string $message="votre email n'est pas valide")
    {
        parent::__construct($message);
    }


public function getErrorMessage()
{
    return $this->message;
}


}