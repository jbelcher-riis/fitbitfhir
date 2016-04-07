<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("Helpers/Requests/PostRequest.php");
include_once("Helpers/Requests/GetRequest.php");
include_once("Models/Patient.php");
include_once("Models/Name.php");
include_once("Models/Identifier.php");
include_once("Models/Device.php");
include_once("Models/Reference.php");
include_once("Models/Observation.php");
include_once("Models/Quantity.php");
include_once("constants.php");

$postRequester = new PostRequest();
$getRequester = new GetRequest();

$patId = "12345678900126";
$devId = "FitBitDevice26";

$response = json_decode($getRequester->makeRequest("Patient", array("identifier"=>$patId)));

if(property_exists($response, "entry")) {
    return http_response_code(409);
} else {
    $pat = new Patient;
    $name = new Name;
    $identifier = new Identifier();

    $name->setGiven(array("jim","belcher"));

    $identifier->setUse("usual");
    $identifier->setValue($patId);

    $pat->setResourceType("Patient");
    $pat->setGender("male");
    $pat->setActive(true);
    $pat->addName($name);
    $pat->addIdentifier($identifier);
    
    $patientResponse = json_decode($postRequester->makeRequest("Patient", $pat)); 
    
    $device = new Device();
    $device->setManufacturer("FitBit");
    $device->setStatus("available");
    
    $patRefence = new Reference();
    $patRefence->setReference("Patient/".$patientResponse->id);
    $device->setPatient($patRefence);
    
    $deviceIdentifier = new Identifier();
    $deviceIdentifier->setUse("usual");
    $deviceIdentifier->setValue($devId);
    $device->addIdentifier($deviceIdentifier);
    
    $deviceResponse = json_decode($postRequester->makeRequest("Device", $device));
    
    $deviceReference = new Reference();
    $deviceReference->setReference("Device/".$deviceResponse->id);
    
    $quantity1 = new Quantity();
    $quantity2 = new Quantity();
            
    $quantity1->setUnit("Steps");
    $quantity1->setValue("4328");
   
    $quantity2->setUnit("Steps");
    $quantity2->setValue("7800"); 
    
    $observation1 = new Observation();
    $observation2 = new Observation();
    
    $observation1->setIssued("2013-04-03T15:30:10+01:00");
    $observation2->setIssued("2013-04-03T15:30:10+01:00");
    
    $observation1->setSubject($patRefence);
    $observation2->setSubject($patRefence);
    
    $observation1->setValueQuantity($quantity1);
    $observation2->setValueQuantity($quantity2);
    
    $observation1->setDevice($deviceReference);
    $observation2->setDevice($deviceReference);
    
    $postRequester->makeRequest("Observation", $observation1);
    $postRequester->makeRequest("Observation", $observation2);
}

?>