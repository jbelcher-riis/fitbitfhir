<?php

class Observation implements JsonSerializable{
    private $resourceType = "Observation";
    private $issued = "";
    private $valueQuantity = null; //quantity obj
    private $device = null; //reference obj
    private $subject = null; //reference obj
            
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
    
    public function jsonSerialize() {
        return [
            "resourceType"=>$this->resourceType,
            "issued"=>$this->issued,
            "valueQuantity"=>$this->valueQuantity,
            "device"=>$this->device,
            "subject"=>$this->subject
        ];
    }      
}
