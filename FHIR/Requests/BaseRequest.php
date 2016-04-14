<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseRequest
 *
 * @author jbelcher
 */
abstract class BaseRequest {
    private $params;
    protected $subject;
    protected $requestType;
    
    function __construct() {
        
    }

    function getSubject() {
        return $this->subject;
    }
        
    function getParams() {
        return $this->params;
    }

    function setParams($params) {
        $this->params = $params;
    }
    
    public function getRequestType() {
        return $this->requestType;
    }
}
