<?php
spl_autoload_register(function ($class_name) {
    echo getcwd();
    if(file_exists($class_name.".php"))
    {
        include $class_name . '.php';
    }elseif(file_exists("Requests/".$class_name.".php"))
    {
        include "Requests/".$class_name.".php";
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
        $request = $this->requestFactory->getRequest("Activity");
        $request->makeRequest();
    }
    
    public function toObject()
    {
        
    }
    
}
