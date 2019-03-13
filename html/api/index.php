<?php

/*
 * No access allowed
 *
 *
 */

use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/../application/autoload.php");


$o = new clsApiError("404", "Error", "Method not Allowed");
$o->browserErrror();
