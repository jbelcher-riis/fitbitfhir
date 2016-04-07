<?php
class Patient implements JsonSerializable
{
	private $resourceType = "";
	private $identifier = array();
	private $active = false;
	private $name = array();
	private $gender = "";

	public function getResourceType()
	{
		return $this->resourceType;
	}

	public function setResourceType($_resourceType)
	{
            $this->resourceType = $_resourceType;
	}

	public function setName($_name)
	{
            $this->name = $_name;
	}

        public function addName($_name)
        {
            $this->name[] = $_name;
        }
        
        function getIdentifier() {
            return $this->identifier;
        }
        
        function setIdentifier($identifier) {
            $this->identifier = $identifier;
        }
        
        function addIdentifier($identifier) {
            $this->identifier[] = $identifier;
        }
        
        function getActive() {
            return $this->active;
        }

        function getGender() {
            return $this->gender;
        }

        function setActive($active) {
            $this->active = $active;
        }

        function setGender($gender) {
            $this->gender = $gender;
        }

                
        public function jsonSerialize()
	{
		return [
			"resourceType"=>$this->resourceType,
			"identifier"=>$this->identifier,
			"active"=>$this->active,
			"name"=>$this->name,
			"gender"=>$this->gender
		];
	}
}

