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
    
    function getRequest(String $request)
    {
        
    }

}
