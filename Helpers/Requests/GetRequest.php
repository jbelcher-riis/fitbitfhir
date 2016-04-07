<?php
include_once("iHTTPRequest.php");

class GetRequest implements iHTTPRequest{
    public function makeRequest($endpoint, $parameters) {
        $url = BASE_URL.$endpoint."?".$this->createParameterString($parameters);
        
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        
        curl_setopt($curl, CURLOPT_HTTPHEADER,
                array("Content-type: application/json","Accept: application/json"));
        
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        
        return $resp;
    }
    
    private function createParameterString($parameters) {
        $parameterString = "";
        
        foreach ($parameters as $key => $value) {
            $parameterString .= "&".$key."=".$value;
        }
        
        $parameterString = ltrim($parameterString, "&");
        
        return $parameterString;
    }
}
