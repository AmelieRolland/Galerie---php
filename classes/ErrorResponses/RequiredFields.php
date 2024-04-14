<?php
// require_once __DIR__ . '/ErrorResponse.php';

class RequiredFields extends Exception
{ 
    public function __construct(string $message="Veuillez remplir tous les champs")
    {
        parent::__construct($message);
    }


public function getErrorMessage()
{
    return $this->message;
}


}