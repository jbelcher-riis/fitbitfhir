<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("FitBit/FitBit.php");
require_once("FitBit/TokenManager.php");

$tokenManager = new TokenManager();
$tokenManager->setUserId("227PMB");

$fitbit = new FitBit($tokenManager);
$fitbit->getActivity();