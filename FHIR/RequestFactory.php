<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequestFactory
 *
 * @author jbelcher
 */
class RequestFactory {
    function createRequest($requestName, $params = null)
    {
        switch ($requestName) {
            case "GetPatientWithIdentifier":
                $request = new PatientRequest();
                $request->setParams(array("identifier"=>$params));
                return $request;
                break;

            default:
                break;
        }
    }
}