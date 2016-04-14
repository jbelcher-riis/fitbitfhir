<?php

class Identifier implements JsonSerializable{

    private $use = "";
    private $value = "";
    
    function getUse() {
        return $this->use;
    }

    function getValue() {
        return $this->value;
    }

    function setUse($use) {
        $this->use = $use;
    }

    function setValue($value) {
        $this->value = $value;
    }

    function createFromResult($result)
    {
        $this->use = $result->use;
        $this->value = $result->value;
    }
    
    public function jsonSerialize() 
    {
        return [
            "use"=>$this->use,
            "value"=>$this->value
        ];
    }
}
