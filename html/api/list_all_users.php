<?php
/*
 * API Endpoint: list_all_users
 *
 * GET /api/list_all_users/
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

include_once(dirname(__FILE__) . "/../application/autoload.php");

// only GET method is allowed
if ($_SERVER['REQUEST_METHOD'] <> 'GET') {
    $o = new clsApiError("500", "Error", "Method not Allowed");
    $o->browserErrror();
    exit;
}
// collect parameters
if (!isset($_GET['requester_user_id'])) {
    $o = new clsApiError("500", "Error", "Some of the Required Params were not passed to this script!");
    $o->browserErrror();
    exit;
}
$requester_user_id = $_GET['requester_user_id'];

// call method
try {
    $o = new clsApi();
    $r = $o->list_all_users($requester_user_id);
    echo $r; // success!
} catch (clsApiError $e) {
    // return/display error
    $e->browserErrror();
    exit;
}









