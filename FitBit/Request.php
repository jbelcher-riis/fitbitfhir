<?php
require_once "TokenManager.php";
/**
 * Description of Request
 *
 * @author jbelcher
 */
abstract class Request {
    /**
     *
     * @var TokenManager
     */
    private $tokenManager;
    
    function __construct(TokenManager $tokenManager) {
        $this->tokenManager = $tokenManager;
    }
    
    function getTokenManager() {
        return $this->tokenManager;
    }

    function setTokenManager(TokenManager $tokenManager) {
        $this->tokenManager = $tokenManager;
    }

        /**
     * 
     * @param Object $params
     */
    function makeRequest($params = null)
    {
        //manage the access token
        if(!empty($this->tokenManager->getRefreshToken()))
        {
            $this->tokenManager->refreshToken();
        }
        else
        {
            //have to re authorize to get access token
            if(!isset($_GET["code"]))
            {
                //has a refresh token, get access token with refresh
                $this->tokenManager->reauthorize();
            }
            else
            {
                $this->tokenManager->setAuthToken($_GET["code"]);
                $this->tokenManager->requestAccessToken();
            }
        }
        
        return $this->getRequest();
    }
    
    protected abstract function getRequest($params=null);
}
