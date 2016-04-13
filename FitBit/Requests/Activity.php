<?php
require_once("../Request.php");
require_once("../TokenManager.php");

/**
 * Description of Activity
 *
 * @author jbelcher
 */
class Activity extends Request{
    
    function getRequest($date) {
        
        $url = "GET https://api.fitbit.com/1/user/".$this->getTokenManager()->getUserId()."/activities/"
                . "date/$params.json";
        
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Authorization: Bearer ".$this->getTokenManager()->getAccessToken()));

        $output=curl_exec($ch);

        curl_close($ch);
        return $output;
    }
}
