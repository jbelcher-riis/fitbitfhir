<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ("constants.php");
include_once ("Helpers/Requests/FitBitAccessRequest.php");


if(isset($_GET["code"]))
{
    $accessRequest = new FitBitAccessRequest();
    $accessRequest->setAuthCode($_GET["code"]);
    var_dump($accessRequest->makeRequest());
}
else{
    echo "I have a token";
}