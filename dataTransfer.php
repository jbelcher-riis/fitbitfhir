<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("FitBit/FitBit.php");
require_once("FitBit/TokenManager.php");
require_once("FHIR/FHIR.php");

//get tokens
$tokenManager = new TokenManager();
$tokenManager->readTokens();

//get fitbit activity
$fitbit = new FitBit($tokenManager);
$activity = $fitbit->getActivity(date("Y-m-d"));
    
$fhir = new FHIR();
$patient = $fhir->getPatientWithIdentifier($tokenManager->getUserId()); // get patient

$device = $fhir->getDeviceWithPatientId($patient->getId()); // get device

$observation = $fhir->getSingleObservations(array("_count"=>1,"subject"=>$patient->getId(),"device"=>$device->getId(), "date"=>date("Y-m-d")));

if(empty($observation->getId()))
{
    var_dump($activity);
    //create observation
    $quantity = new Quantity();
    $quantity->setUnit("Steps");
    $quantity->setValue($activity->summery->steps);
    
    $patRefence = new Reference();
    $patRefence->setReference("Patient/".$patient->getId());
    
    $deviceReference = new Reference();
    $deviceReference->setReference("Device/".$device->getId());
    
    $dateTime = new DateTime();
    $dt = $dateTime->format("Y-m-d\TH:i:sP");
    
    $observation->setIssued($dt);
    $observation->setEffectiveDateTime($dt);
    $observation->setSubject($patRefence);
    $observation->setValueQuantity($quantity);
    $observation->setDevice($deviceReference);
    
}
else
{
    //update observation
}

//save new refresh token
$tokenManager->updateRefreshToken();
