<?php
/*
 * API Endpoint: list_all_users
 *
 * POST /api/register/
 *
 * Handles registering a brand new user.
 *
 * Returns an HTTP 500 error if the user is already registered, if required fields are not present, or if email is invalid
 *
 * otherwise returns
 *
 *
 */

use DaTechDevTest\Api\clsApi;
use DaTechDevTest\Api\clsApiError;

include_once(dirname(__FILE__) . "/../application/autoload.php");

// only POST alloaed
if ($_SERVER['REQUEST_METHOD'] <> 'POST') {
    header("HTTP/1.1 500 Method not Allowed");
    $o = new clsApiError("500", "Error", "Method not Allowed");
    echo $o->toJson();
    exit;
}
if (
    !isset($_POST['email']) ||
    !isset($_POST['password']) ||
    !isset($_POST['first_name']) ||
    !isset($_POST['last_name'])
) {
    $o = new clsApiError("500", "Error", "Some of the Required Params were not passed to this script!");
    $o->browserErrror();
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

// call method
try {
    $o = new clsApi();
    $r = $o->register($email, $password, $first_name, $last_name);
    echo $r;
    exit;
} catch (clsApiError $e) {
    // return/display error
    $e->browserErrror();
    exit;
}


