<?php
class Name implements JsonSerializable
{
	private $given = array();

	public function addToGiven($name)
	{
		$this->given[] = $name;
	}

	public function setGiven($_given)
	{
		$this->given = $_given;
	}

	public function getGiven()
	{
		return $this->given;
	}

        function createFromResult($result)
        {
            $this->given = $result->given;
        }
        
	public function jsonSerialize()
	{
		return [
			"given"=>$this->given
		];
	}
}