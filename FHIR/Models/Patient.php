<?php
class Patient implements JsonSerializable
{
        /**
         *
         * @var string
         */
	private $resourceType = "";
        /**
         *
         * @var array identifiers
         */
	private $identifier = array();
        /**
         *
         * @var boolean
         */
	private $active = false;
        /**
         *
         * @var array name
         */
	private $name = array();
        /**
         *
         * @var string
         */
	private $gender = "";
        /**
         *
         * @var string
         */
        private $id = "";
        
        function getId() {
            return $this->id;
        }

        function setId($id) {
            $this->id = $id;
        }
        
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
            
            $this->active = $result->active;
            $this->id = $result->id;
            $this->gender = $result->gender;
            $this->resourceType = $result->resourceType;
            
            //populate identifiers
            foreach ($result->identifier as $value) {
                $identifier = new Identifier();
                $identifier->createFromResult($value);
                
                $this->identifier[] = $identifier;
            }
            
            //populate name
            foreach ($result->name as $value) {
                $name = new Name();
                $name->createFromResult($value);
                $this->name = $name;
            }
            
        }
        
        public function jsonSerialize()
	{
		return [
                        "id"=>$this->id,
			"resourceType"=>$this->resourceType,
			"identifier"=>$this->identifier,
			"active"=>$this->active,
			"name"=>$this->name,
			"gender"=>$this->gender
		];
	}
}

