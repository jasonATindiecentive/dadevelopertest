<?php
/*
 *
 * clsApiError.php
 *
 * Implements an error handler to construct and handle errors as described in the D&A Technologies Backend
 * Devloper Test
 *
 *
 * Jason Ruddock
 *
 * Created 3/11/19 for Developer Test
 *
 *
 */
namespace DaTechDevTest\Api;

include_once dirname(__FILE__) . "/../config.php";

class clsApiError extends \Exception {
    public $http_code = 500;
    public $api_code;
    public $message;

    /*
     * Construct an error
     *
     *
     */

    public function __construct($http_code = 500, $api_code, $message) {
        $this->http_code = $http_code;
        $this->api_code = $http_code;
        $this->message = $message;
    }

    /*
     *
     * Return the error to the browser
     *
     *
     */
    public function browserErrror() {
        $httpcode = $this->http_code;
        if (!is_numeric($httpcode)) $httpcode = 500;
        header("HTTP/1.1 {$httpcode} Method not Allowed");
        echo $this->toJson();
        exit;
    }

    /*
     *
     * Return a JSON representation of the error
     *
     *
     */
    protected function toJson() {
        $r = new \stdClass();
        $r->code = $this->api_code;
        $r->message = $this->message;

        return json_encode($r);
    }

}

