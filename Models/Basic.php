<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Basic
 *
 * @author jbelcher
 */
class Basic implements JsonSerializable{
    /**
     * @var String 
     */
    private $resourceType = "Basic";
    /**
     * @var array(Identifiers) 
     */
    private $identifier = array();
    /**
     * @var CodeableConcept
     */
    private $code;
    /**
     * @var Reference 
     */
    private $subject;
    
    function getResourceType() {
        return $this->resourceType;
    }

    function getIdentifier() {
        return $this->identifier;
    }

    function getCode() {
        return $this->code;
    }

    function getSubject() {
        return $this->subject;
    }

    function setResourceType($resourceType) {
        $this->resourceType = $resourceType;
    }

    function setIdentifier(array $identifier) {
        $this->identifier = $identifier;
    }

    function setCode(CodeableConcept $code) {
        $this->code = $code;
    }

    function setSubject(Reference $subject) {
        $this->subject = $subject;
    }

    public function jsonSerialize() {
        return [
            "resourceType"=>$this->resourceType,
            "identifier"=>$this->identifier,
            "subject"=>$this->subject,
            "code"=>$this->code
        ];
    }

}
