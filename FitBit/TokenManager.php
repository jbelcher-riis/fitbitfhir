<?php

/**
 * Description of TokenManager
 *
 * @author jbelcher
 */
class TokenManager {
    private $authToken;
    private $accessToken;
    private $refreshToken;
    private $userId;
    private $basicAuth;
    
    function getBasicAuth() {
        return $this->basicAuth;
    }

    function setBasicAuth($basicAuth) {
        $this->basicAuth = $basicAuth;
    }

    function getAuthToken() {
        return $this->authToken;
    }

    function getAccessToken() {
        return $this->accessToken;
    }

    function getRefreshToken() {
        return $this->refreshToken;
    }

    function getUserId() {
        return $this->userId;
    }

    function setAuthToken($authToken) {
        $this->authToken = $authToken;
    }

    function setAccessToken($accessToken) {
        $this->accessToken = $accessToken;
    }

    function setRefreshToken($refreshToken) {
        $this->refreshToken = $refreshToken;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function reauthorize() {
        header("Location: https://www.fitbit.com/oauth2/authorize?response_type=code&client_id=".$this->userId."&redirect_uri=http%3A%2F%2Ffitbitfhir.riis.com%2Ffitbitfhir%2FdataTransfer.php&scope=activity");
        exit;
        /*
        //$url = ACCESS_TOKEN_ENDPOINT."?client_id=".$this->getUserId()."&grant_type=authorization_code&redirect_uri=http%3A%2F%2Ffitbitfhir.riis.com%2Ffitbitfhir%2FdataTransfer.php&code=".$this->authToken;
        $redirectURI = "redirect_uri=http%3A%2F%2Ffitbitfhir.riis.com%2Ffitbitfhir%2FdataTransfer.php";
        $url = "https://www.fitbit.com/oauth2/authorize?response_type=code&client_id=".$this->userId."&scope=activity";
        $ch = curl_init($url);
       
        # Setting our options
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        
        curl_setopt($ch, CURLOPT_HTTPHEADER,
         
                array("Content-type: application/x-www-form-urlencoded","Accept: application/json", 
                    "Authorization: Basic ".$this->basicAuth
                    )
                );
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);

        var_dump($response);
        */
    }
    
    function refreshToken() {
        
    }
    
    function requestAccessToken() {
        $url = "https://api.fitbit.com/oauth2/token?client_id=".$this->getUserId()."&grant_type=authorization_code&redirect_uri=http%3A%2F%2Ffitbitfhir.riis.com%2Ffitbitfhir%2FdataTransfer.php&code=".$this->getAuthToken();
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

        $objResponse = json_decode($response);
        
        $this->accessToken = $objResponse->access_token;
        $this->refreshToken = $objResponse->refresh_token;
        
        return $response;
    }
}
