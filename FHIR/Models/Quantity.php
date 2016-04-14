<?php

class Quantity implements JsonSerializable{
    private $value = "";
    private $unit = "";
    
    function getValue() {
        return $this->value;
    }

    function getUnit() {
        return $this->unit;
    }

    function setValue($value) {
        $this->value = $value;
    }

    function setUnit($unit) {
        $this->unit = $unit;
    }

        
    public function jsonSerialize() {
        return [
            "value"=>$this->value,
            "unit"=>$this->unit
        ];
    }
}
