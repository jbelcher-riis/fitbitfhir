<?php
include_once("iHTTPRequest.php");

class PostRequest implements iHTTPRequest{
    
    public function makeRequest($endpoint, $object) 
    {
        $url = BASE_URL.$endpoint;
        $ch = curl_init($url);
       
        # Setting our options
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($object));
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Content-type: application/json","Accept: application/json"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
}
