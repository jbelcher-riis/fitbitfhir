<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("FitBit/FitBit.php");
require_once("FitBit/TokenManager.php");

$tokenManager = new TokenManager();
$tokenManager->setUserId("3HHGQX");

$fitbit = new FitBit($tokenManager);
$response = $fitbit->getActivity(date("Y-m-d"));

var_dump($response);