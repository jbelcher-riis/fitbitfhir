<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$x = new DateTime();
echo $x->format("Y-m-d\TH:i:sP");

