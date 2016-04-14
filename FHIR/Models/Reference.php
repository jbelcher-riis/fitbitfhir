<?php

class Reference implements JsonSerializable{
    private $reference = "";
    
    function getReference() {
        return $this->reference;
    }

    function setReference($reference) {
        $this->reference = $reference;
    }

    public function jsonSerialize() {
        return [
            "reference"=>$this->reference
        ];
    }
}
