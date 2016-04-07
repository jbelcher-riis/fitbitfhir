<?php

class Device implements JsonSerializable{
    
    private $resourceType = "Device";
    private $identifier = array();
    private $status = "";
    private $manufacturer = "";
    private $patient = null;
    
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
    
    public function jsonSerialize() {
        return [
            "resourceType"=>$this->resourceType,
            "identifier"=>$this->identifier,
            "status"=>$this->status,
            "manufacturer"=>$this->manufacturer,
            "patient"=>$this->patient
        ];
    }
}
