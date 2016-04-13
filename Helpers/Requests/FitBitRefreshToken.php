<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FitBitRefreshToken
 *
 * @author jbelcher
 */
class FitBitRefreshToken implements iHTTPRequest{
    private $refreshToken = "";
    
    public function setRefreshToken($_token)
    {
        $this->refreshToken = $_token;
    }
    
    public function makeRequest($endpoint = null, $parameters = null) {
        $url = ACCESS_TOKEN_ENDPOINT."?grant_type=refresh_token&refresh_token=".$this->refreshToken;
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



