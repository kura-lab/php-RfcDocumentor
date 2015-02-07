<?php
// sample.php

require_once("vendor/autoload.php");

use kuralab\rfc\RfcDocumentor;

// Initialize
$rfc = new RfcDocumentor("6749");

// Generate Word Frequency of type Array
$ret = $rfc->generateWordFrequency();
var_dump($ret);
