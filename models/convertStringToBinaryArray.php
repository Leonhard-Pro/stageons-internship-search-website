<?php
function convertStringToBinaryArray(string $authorization)
{
    $arrayAuthorization = array();
    for ($i = 0; $i < strlen($authorization); $i++)
    {
        if ($authorization[$i] == "0")
        {
            array_push($arrayAuthorization, false );
        }
        else{
            array_push($arrayAuthorization, true );
        }
        
    }
    return $arrayAuthorization;
}
?>