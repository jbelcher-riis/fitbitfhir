<?php

class Observation implements JsonSerializable{
    private $resourceType = "Observation";
    private $issued = "";
    private $valueQuantity = null; //quantity obj
    private $device = null; //reference obj
    private $subject = null; //reference obj
    private $effectiveDateTime = "";
    private $id = "";        
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getEffectiveDateTime() {
        return $this->effectiveDateTime;
    }

    function setEffectiveDateTime($effectiveDateTime) {
        $this->effectiveDateTime = $effectiveDateTime;
    }

    function getResourceType() {
        return $this->resourceType;
    }

    function getValueQuantity() {
        return $this->valueQuantity;
    }

    function getDevice() {
        return $this->device;
    }

    function getSubject() {
        return $this->subject;
    }

    function setResourceType($resourceType) {
        $this->resourceType = $resourceType;
    }

    function setValueQuantity($valueQuantity) {
        $this->valueQuantity = $valueQuantity;
    }

    function setDevice($device) {
        $this->device = $device;
    }

    function setSubject($subject) {
        $this->subject = $subject;
    }
    
    function getIssued() {
        return $this->issued;
    }

    function setIssued($issued) {
        $this->issued = $issued;
    }
    
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

       $this->issued = $result->issued;
       $this->resourceType = $result->resourceType;
       $this->valueQuantity = $result->valueQuantity;
       $this->effectiveDateTime = $result->effectiveDateTime;
       $this->id = $result->id;
       
       $patientRef = new Reference();
       $patientRef->setReference($result->subject);
       $this->subject = $patientRef;
       
       $deviceRef = new Reference();
       $deviceRef->setReference($result->device);
       $this->device = $deviceRef;
    }
    
    public function jsonSerialize() {
        return [
            "effectiveDateTime"=>$this->effectiveDateTime,
            "id"=>$this->id,
            "resourceType"=>$this->resourceType,
            "issued"=>$this->issued,
            "valueQuantity"=>$this->valueQuantity,
            "device"=>$this->device,
            "subject"=>$this->subject
        ];
    }      
}
