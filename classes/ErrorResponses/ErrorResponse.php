<?php

abstract class ErrorResponse
{

    public function __construct(
        protected string $message
         )
        {
    }

    abstract public function getErrorMessage();





    // public const INVALID_EMAIL = 1;
    // public const FIELDS_REQUIRED = 2;
    // public const ACCOUNT_NOT_EXIST = 3;
    // public const UPLOAD_ERROR = 4;



    // public static function getMessage(int $errorCode)

    // {
    //     return match ($errorCode) {
    //         self::INVALID_EMAIL => "Oopsie! Veuillez remplir un email valide",
    //         self::FIELDS_REQUIRED => "Erreur : tous les champs sont requis :(",
    //         self::ACCOUNT_NOT_EXIST=> "Oh non! Nous ne vous reconnaissons pas :(",
    //         self::UPLOAD_ERROR=> "Oh non! Il y a eu une erreur sur l'enregistrement du fichier :(",
    //         default => "So sorry, une ereur est survenue!"
    //     };
    // }



}