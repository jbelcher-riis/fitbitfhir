<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ObservationUpdateRequest
 *
 * @author jbelcher
 */
class ObservationUpdateRequest extends BaseRequest{
    function __construct() {
        parent::__construct();
        $this->subject = "Observation";
        $this->requestType = "PUT";
    }
}
