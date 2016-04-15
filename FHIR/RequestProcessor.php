<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequestProcessor
 *
 * @author jbelcher
 */
class RequestProcessor {
    /**
     *
     * @var BaseRequest
     */
    private $request;
    
    function setRequest(BaseRequest $request) {
        $this->request = $request;
    }

    function makeRequest() {
        
        if($this->request->getRequestType() == "GET")
        {
            return $this->getRequest();
        } 
        else if($this->request->getRequestType() == "POST" || $this->request->getRequestType() == "PUT")
        {
            return $this->postRequest();
        }
    }
    
    private function postRequest() {
        $url = BASE_URL.$this->request->getSubject();
        $ch = curl_init($url);
       
        # Setting our options
        curl_setopt($ch, CURLOPT_HEADER, false);
        
        if($this->request->getRequestType() == "POST")
        {
            curl_setopt($ch, CURLOPT_POST, 1);
        }
        else if($this->request->getRequestType() == "PUT"){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        }
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->request->getParams()));
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Content-type: application/json","Accept: application/json"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }
    
    private function getRequest() {
        $url = BASE_URL.$this->request->getSubject()."?".$this->createParameterString($this->request->getParams());
        
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
