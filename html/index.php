<?php

/*
 * No access allowed
 *
 *
 */

use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/application/autoload.php");


$o = new clsApiError("404", "Error", "Page not found");
$o->browserErrror();
