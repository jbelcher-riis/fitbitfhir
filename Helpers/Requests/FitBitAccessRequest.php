<?php
include_once('iHTTPRequest.php');

class FitBitAccessRequest implements iHTTPRequest{
    
    public function makeRequest($endpoint=null, $parameters=null) {
        $url = ACCESS_TOKEN_ENDPOINT."client_id=227PMB&grant_type=authorization_code&redirect_uri=http%3A%2F%2Ffitbitfhir.riis.com%2Ffitbitfhir%2FdataTransfer.php&code=".AUTH_TOKEN;
        $ch = curl_init($url);
       
        if(isset($_GET["run"]))
        {
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
}
