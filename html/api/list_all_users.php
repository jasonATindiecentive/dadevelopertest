<?php
/*
 * API Endpoint: list_all_users
 *
 * GET /api/list_all_users/
 *
 * Displays all of the users that have registered to use the app excluding the requester.
 *
 *
 * Example request:
 * {
 * “requester_user_id”: 3
 * }
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
    $o = new clsApiError("405", "100", "Method not Allowed");
    $o->browserErrror();
    exit;
}
// collect parameters
if (!isset($_GET['requester_user_id'])) {
    $o = new clsApiError("500", "101", "Some of the Required Params were not passed to this script!");
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









