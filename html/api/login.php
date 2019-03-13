<?php
/*
 * API Endpoint: list_all_users
 *
 * POST /api/login/
 *
 * hanles a login request from the user. If the login was unsuccesful, an approprate error response is returned.
 *
 *
 * Example request:
 * {
 * “email”:”info@datechnologies.co”, “password”:”Test123”
 * }
 *
 * Example response:
 * {
 * “user_id”:1, “email”:” info@datechnologies.co ”, “first_name”:”John”, “last_name”:”Doe”
 * }
 *
 *
 */

use DaTechDevTest\Api\clsApi;
use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/../application/autoload.php");

// only GET alloaed
if ($_SERVER['REQUEST_METHOD'] <> 'POST') {
    $o = new clsApiError("500", "100", "Method not Allowed");
    $o->browserErrror();
    exit;
}

// collect parameters
if (
    !isset($_POST['email']) ||
    !isset($_POST['password'])
) {
    $o = new clsApiError("500", "101", "Some of the Required Params were not passed to this script!");
    $o->browserErrror();
    exit;
}
$email = $_POST['email'];
$password = $_POST['password'];

// call method
try {
    $o = new clsApi();
    $r = $o->login($email, $password);
    echo $r; // success!
} catch (clsApiError $e) {
    // return/display error
    $e->browserErrror();
    exit;
}









