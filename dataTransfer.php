<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("FitBit/FitBit.php");
require_once("FitBit/TokenManager.php");

$tokenManager = new TokenManager();
$tokenManager->setUserId("227PMB");
$tokenManager->setRefreshToken("7e195e38e496d6b280e1507aace40d487ee75dc74f376b3448707b1ae5de9426");

$fitbit = new FitBit($tokenManager);
$fitbit->getActivity("2016-04-13");