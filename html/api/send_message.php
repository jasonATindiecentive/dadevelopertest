<?php
/*
 * API Endpoint: send a message
 *
 * POST /api/send_messagee/
 *
 *
 */

use DaTechDevTest\Api\clsApi;
use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/../../application/autoload.php");

// only POST alloaed
if ($_SERVER['REQUEST_METHOD'] <> 'POST') {
    header("HTTP/1.1 500 Method not Allowed");
    $o = new clsApiError("500", "Error", "Method not Allowed");
    echo $o->toJson();
    exit;
}
if (
    !isset($_POST['sender_user_id']) ||
    !isset($_POST['receiver_user_id']) ||
    !isset($_POST['message'])
) {
    $o = new clsApiError("500", "Error", "Some of the Required Params were not passed to this script!");
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


