<?php
/**
 * Description of Activity
 *
 * @author jbelcher
 */
class Activity extends Request{
    
    function getRequest($date = null) {
        
        $url = "GET https://api.fitbit.com/1/user/".$this->getTokenManager()->getUserId()."/activities/"
                . "date/$date.json";
        
        $ch = curl_init($url);
        
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                array("Authorization: Bearer ".$this->getTokenManager()->getAccessToken()));

        $output=curl_exec($ch);

        curl_close($ch);
        var_dump($url);
        return $output;
    }
}
