<?php

function redirect(string $location): void
{
    header('Location: ' . $location);
    exit;
}



function randomStr(int $lenght)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);

    for ($i = 0, $randomString = ''; $i < $lenght; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}
