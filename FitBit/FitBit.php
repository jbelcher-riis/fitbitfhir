<?php
spl_autoload_register(function ($class_name) {
    if(file_exists("FitBit/".$class_name.".php"))
    {
        include "FitBit/".$class_name . '.php';
    }elseif(file_exists("FitBit/Requests/".$class_name.".php"))
    {
        include "FitBit/Requests/".$class_name.".php";
    }
});

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
     * @var FitbitRequestFactory 
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
        $this->requestFactory = new FitBitRequestFactory($tokenManger);
    }

    public function getActivity($date)
    {
        $request = $this->requestFactory->getRequest("Activity");
        $this->response = $request->makeRequest($date);
        return $this->response;
    }
    
    public function toObject()
    {
        
    }
    
}
