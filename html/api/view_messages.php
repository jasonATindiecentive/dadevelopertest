<?php
/*
 * API Endpoint: list_all_users
 *
 * GET /api/view_messages/
 *
 * returns JSON list of all users e.g.:
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

include_once(dirname(__FILE__) . "/../../application/autoload.php");

// only GET alloaed
if ($_SERVER['REQUEST_METHOD'] <> 'GET') {
    $o = new clsApiError("500", "Error", "Method not Allowed");
    $o->browserErrror();
    exit;
}

// collect parameters
if (
    !isset($_GET['user_id_a']) ||
    !isset($_GET['user_id_b'])
) {
    $o = new clsApiError("500", "Error", "Some of the Required Params were not passed to this script!");
    $o->browserErrror();
    exit;
}
$user_id_a = $_GET['user_id_a'];
$user_id_b = $_GET['user_id_b'];

// call method
try {
    $o = new clsApi();
    $r = $o->view_messages($user_id_a, $user_id_b);
    echo $r; // success!
} catch (clsApiError $e) {
    // return/display error
    $e->browserErrror();
    exit;
}









