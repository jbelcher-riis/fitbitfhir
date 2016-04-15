<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeviceRequest
 *
 * @author jbelcher
 */
class DeviceRequest extends BaseRequest{
    function __construct() {
        parent::__construct();
        $this->subject = "Device";
        $this->requestType = "GET";
    }
}
