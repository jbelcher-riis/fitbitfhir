<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PatientWithIdentifier
 *
 * @author jbelcher
 */
class PatientRequest extends BaseRequest{
    
    function __construct() {
        parent::__construct();
        $this->subject = "Patient";
        $this->requestType = "GET";
    }

}
