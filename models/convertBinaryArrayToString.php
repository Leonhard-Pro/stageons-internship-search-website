<?php
function convertStringToBinaryArray(array $authorization)
{
    $stringAuthorization = "";
    for ($i = 0; $i < sizeof($authorization); $i++)
    {
        if ($authorization[$i] == false)
        {
            $stringAuthorization += "0";
        }
        else{
            $stringAuthorization += "1";
        }
    }
    return $stringAuthorization;
}
?>