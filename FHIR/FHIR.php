<?php
spl_autoload_register(function ($class_name) {
    
    if(file_exists($class_name))
    {
        include $class_name.'.php';
    }
    if(file_exists("FHIR/".$class_name.".php"))
    {
        include "FHIR/".$class_name . '.php';
    }elseif(file_exists("FHIR/Requests/".$class_name.".php"))
    {
        include "FHIR/Requests/".$class_name.".php";
    }elseif(file_exists("FHIR/Models/".$class_name.".php"))
    {
        include "FHIR/Models/".$class_name.".php";
    }else
    {
        die("The file {$class_name}.php could not be found!");
    }
});

include_once 'constants.php';
/**
 * Description of FHIR
 *
 * @author jbelcher
 */
class FHIR {
    
    /** 
     * @var RequestFactory 
     */
    private $requestFactory;
    /**
     *
     * @var RequestProcessor 
     */
    private $requestProcessor;
    /**
     *
     * @var string
     */
    private $response;
    
    function __construct() {
        $this->requestFactory = new RequestFactory();
        $this->requestProcessor = new RequestProcessor();
    }

    function getPatientWithIdentifier($identifier)
    {
        
        $request = $this->requestFactory->createRequest("GetPatientWithIdentifier",$identifier);
        
        $this->requestProcessor->setRequest($request);
        
        $this->response = $this->requestProcessor->makeRequest();
        
        $patient = new Patient();
        $patient->createFromResult(json_decode($this->response));

        return $patient;
       
    }
    
    function getDeviceWithPatientId($patientId)
    {
        $request = $this->requestFactory->createRequest("GetDeviceWithPatientId", $patientId);
        
        $this->requestProcessor->setRequest($request);
        
        $this->response = $this->requestProcessor->makeRequest();
        
        $device = new Device();
        $device->createFromResult(json_decode($this->response));
        
        return $device;
    }
    
    function toObject()
    {
        return json_decode($this->response);
    }
}
