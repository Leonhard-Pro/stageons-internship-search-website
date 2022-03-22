<?php
function convertStringToBinaryArray(string $authorization)
{
    $arrayAuthorization = array();
    for ($i = 0; $i < strlen($authorization); $i++)
    {
        $arrayAuthorization[] = decbin(ord($authorization[$i]));
    }
    return $arrayAuthorization;
}
?>