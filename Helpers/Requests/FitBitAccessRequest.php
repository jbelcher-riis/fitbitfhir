<?php
include_once('iHTTPRequest.php');
include_once('constants.php');

class FitBitAccessRequest implements iHTTPRequest{
    private $authCode = "";
    
    public function setAuthCode($_authCode)
    {
        $this->authCode = $_authCode;
    }
    
    public function makeRequest($endpoint=null, $parameters=null) {
        $url = ACCESS_TOKEN_ENDPOINT."?client_id=227PMB&grant_type=authorization_code&redirect_uri=http%3A%2F%2Ffitbitfhir.riis.com%2Ffitbitfhir%2FdataTransfer.php&code=".$this->authCode;
        $ch = curl_init($url);
       
        # Setting our options
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Content-type: application/x-www-form-urlencoded","Accept: application/json", 
                    "Authorization: Basic MjI3UE1COjcwNGNjZmZiYzgwYWJiMzc3NDgzNmVkMTdlNzljOGIx"
                    )
                );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
        
    }
}
