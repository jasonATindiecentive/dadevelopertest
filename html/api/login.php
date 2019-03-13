<?php
/*
 * API Endpoint: list_all_users
 *
 * POST /api/login/
 *
 * hanles a login request from the user. If the login was unsuccesful, an approprate error response is returned.
 *
 * "users":[
 * {
 * "user_id":1, "email":"ppeck@datechnologies.co", "first_name":"Preston", "last_name":"Peck"
 * }, {
 * "user_id":2, "email":"jgreen@datechnologies.co", "first_name":"Jake ",
 * "last_name":"Green" }
 * ] }
 *
 */

use DaTechDevTest\Api\clsApi;
use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/../application/autoload.php");

// only GET alloaed
if ($_SERVER['REQUEST_METHOD'] <> 'POST') {
    $o = new clsApiError("500", "Error", "Method not Allowed");
    $o->browserErrror();
    exit;
}

// collect parameters
if (
    !isset($_POST['email']) ||
    !isset($_POST['password'])
) {
    $o = new clsApiError("500", "Error", "Some of the Required Params were not passed to this script!");
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









