<?php
/**
 * Description of Activity
 *
 * @author jbelcher
 */
class Activity extends Request{
    
    function getRequest($date = null) {
        
        $url = "https://api.fitbit.com/1/user/".$this->getTokenManager()->getUserId()."/activities/"
                . "date/$date.json";
        $headers = array("Authorization: Bearer ".$this->getTokenManager()->getAccessToken());
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                $headers);

        $output=curl_exec($ch);

        curl_close($ch);
        
        return $output;
    }
}
