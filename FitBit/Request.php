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
        echo "run";
        if(!empty($this->tokenManager->getRefreshToken()))
        {
            
        }
        else
        {
            //have to re authorize to get access token
            echo "run";
            if(!isset($_GET["code"]))
            {
                echo "run";
                //has a refresh token, get access token with refresh
                $this->tokenManager->reauthorize();
            }
            else
            {
                $this->tokenManager->setAuthToken($_GET["code"]);
                $this->tokenManager->requestAccessToken();
            }
        }
    }
    
    protected abstract function getRequest($params=null);
}
