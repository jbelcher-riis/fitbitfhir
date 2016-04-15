<?php

class Device implements JsonSerializable{
    
    private $resourceType = "Device";
    private $identifier = array();
    private $status = "";
    private $manufacturer = "";
    private $patient = null;
    private $id = "";
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function getResourceType() {
        return $this->resourceType;
    }

    function getIdentifier() {
        return $this->identifier;
    }

    function getStatus() {
        return $this->status;
    }

    function getManufacturer() {
        return $this->manufacturer;
    }

    function getPatient() {
        return $this->patient;
    }

    function setResourceType($resourceType) {
        $this->resourceType = $resourceType;
    }

    function setIdentifier($identifier) {
        $this->identifier = $identifier;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setManufacturer($manufacturer) {
        $this->manufacturer = $manufacturer;
    }

    function setPatient($patient) {
        $this->patient = $patient;
    }

    function addIdentifier($_identifier) {
        $this->identifier[] = $_identifier;
    }
    
    /**
    * 
    * @param stdObject $result
    * @return boolean
    */
   public function createFromResult($result)
   {
       if(property_exists($result, "entry")) //search result
       {
           $result = $result->entry[0]->resource;
       }

       if(!property_exists($result, "id")) //direct find
       {
           return false;
       }

       $this->manufacturer = $result->manufacturer;
       $this->resourceType = $result->resourceType;
       $this->status = $result->status;
       $this->id = $result->id;

       $patientRef = new Reference();
       $patientRef->setReference($result->patient);
       $this->patient = $patientRef;
       
       //populate identifiers
       foreach ($result->identifier as $value) {
           $identifier = new Identifier();
           $identifier->createFromResult($value);

           $this->identifier[] = $identifier;
       }
   }
    
    public function jsonSerialize() {
        return [
            "id"=>$this->id,
            "resourceType"=>$this->resourceType,
            "identifier"=>$this->identifier,
            "status"=>$this->status,
            "manufacturer"=>$this->manufacturer,
            "patient"=>$this->patient
        ];
    }
}
