<?php
/**
 * Description of RequestFactory
 *
 * @author jbelcher
 */
class RequestFactory {
    
    /**
     *
     * @var TokenManager 
     */
    private $tokenManager;
    
    function __construct(TokenManager $tokenManager) {
        $this->tokenManager = $tokenManager;
    }
    
    function getRequest($request)
    {
        switch ($request) {
            case "Activity":
                require_once("Requests/Activity.php");
                return new Activity($this->tokenManager);
                break;

            default:
                break;
        }
    }

}
