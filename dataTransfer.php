<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once ("constants.php");
include_once ("Helpers/Requests/FitBitAccessRequest.php");

if(isset($_GET["run"]))
{
    $accessRequest = new FitBitAccessRequest();
    $accessRequest->makeRequest();
}
else{
    echo "I have a token";
}