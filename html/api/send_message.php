<?php
/*
 * API Endpoint: send a message
 *
 * POST /api/send_message/
 *
 * Sends a message from one user to another. Returns a success code if the message was sent successfully.
 *
 * Example request:
 * {
 * “sender_user_id”: 1, “receiver_user_id”: 2, “message” : “Example text”
 * }
 *
 * Example reply:
 * {
 * “success_code” : “200”, “success_title” : “Message Sent”, “success_message”: “Message was
 * sent successfully” }
 *
 *
 *
 *
 */

use DaTechDevTest\Api\clsApi;
use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/../application/autoload.php");

// only POST alloaed
if ($_SERVER['REQUEST_METHOD'] <> 'POST') {
    $o = new clsApiError("405", "100", "Method not Allowed");
    $o->browserErrror();
    exit;
}
if (
    !isset($_POST['sender_user_id']) ||
    !isset($_POST['receiver_user_id']) ||
    !isset($_POST['message'])
) {
    $o = new clsApiError("500", "101", "Some of the Required Params were not passed to this script!");
    $o->browserErrror();
    exit;
}

$sender_user_id = $_POST['sender_user_id'];
$receiver_user_id = $_POST['receiver_user_id'];
$message = $_POST['message'];

// call method
try {
    $o = new clsApi();
    $r = $o->send_message($sender_user_id, $receiver_user_id, $message);
    echo $r;
    exit;
} catch (clsApiError $e) {
    // return/display error
    $e->browserErrror();
    exit;
}


