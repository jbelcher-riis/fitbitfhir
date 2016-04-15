<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("FitBit/FitBit.php");
require_once("FitBit/TokenManager.php");
require_once("FHIR/FHIR.php");

$tokenManager = new TokenManager();
$tokenManager->readTokens();

//get fitbit activity
$fitbit = new FitBit($tokenManager);
$response = $fitbit->getActivity(date("Y-m-d"));

var_dump($response);
    
    
$fhir = new FHIR();
$patient = $fhir->getPatientWithIdentifier($tokenManager->getUserId());



var_dump($patient);
//save new refresh token
$tokenManager->updateRefreshToken();
