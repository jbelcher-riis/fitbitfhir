<?php
require_once("RequestFactory.php");

/**
 * Description of FitBit
 *
 * @author jbelcher
 */
class FitBit {
    /**
     * @var TokenManager 
     */
    private $tokenManger;
    /**
     *
     * @var RequestFactory 
     */
    private $requestFactory;
    /**
     *
     * @var String
     */
    private $response;
    
    /**
     * 
     * @param TokenManager $tokenManger
     */
    function __construct(TokenManager $tokenManger) {
        $this->tokenManger = $tokenManger;
        $this->requestFactory = new RequestFactory($tokenManger);
    }

    public function getActivity()
    {
        
    }
    
    public function toObject()
    {
        
    }
    
}
