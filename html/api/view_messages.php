<?php
/*
 * API Endpoint: list_all_users
 *
 * GET /api/view_messages/
 *
 * Returns all messages that these two users have sent to each other in date order.
 *
 *
 * Example request:
 * {
 * "user_id_a": "1", "user_id_b": "2"
 * }
 *
 * Example reply:
 * {
 * "messages":[
 * {
 * "message_id":1, "sender_user_id":1, "message":"Hey what is up?", "epoch":1429220026
 * }, {
 * "message_id":2, "sender_user_id":1, "message":"Hey what is up?", "epoch":1429320028
 * }
 * ] }
 *
 *
 */

use DaTechDevTest\Api\clsApi;
use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/../../application/autoload.php");

// only GET alloaed
if ($_SERVER['REQUEST_METHOD'] <> 'GET') {
    $o = new clsApiError("500", "100", "Method not Allowed");
    $o->browserErrror();
    exit;
}

// collect parameters
if (
    !isset($_GET['user_id_a']) ||
    !isset($_GET['user_id_b'])
) {
    $o = new clsApiError("500", "101", "Some of the Required Params were not passed to this script!");
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









