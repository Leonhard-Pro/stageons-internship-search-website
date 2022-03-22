<?php
function convertStringToBinaryArray(array $authorization)
{
    $stringAuthorization = "";
    for ($i = 0; $i < sizeof($authorization); $i++)
    {
        $stringAuthorization = $stringAuthorization . chr(bindec($authorization[$i]));
    }
    return $stringAuthorization;
}
?>