<?php

/*
 *
 * clsApi.php
 *
 * Implements the methods described in the D&A Technologies Backend Developer Test
 *
 *
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

class clsApi {

    protected $db;

    /*
     * Contructor
     *
     * Not much to do here, however if security were added to this API then this might be where
     * credentails would be passed in.
     *
     *
     */
    public function __construct() {

        // connect to database
        $this->db = @new \mysqli(DB_ENDPOINT, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($this->db->connect_errno <> 0) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }
    }


    /*
    *
    * register
    *
    * Implements the 'register' method. Registers a User.
    *
    * Pass in a JSON object consisting of three strings, email, password, first_name, and last_name e.g.:
    * {
    * “email”:” info@datechnologies.co ”, “password”:”Test123”, “first_name”:”John”, “last_name”:”Doe”
    * }
    *
    *
    *
    * @param   string   email   The user's Email Address
    * @param   string   password   The user's Password
    * @param   string   first_name   The user's First Name
    * @param   string   last_name   The user's Last Name
    * @return  string   The JSON-formatted output
    *
    * @throws clsApiError
    *
    * code: Error
    * message: "user already exists", "bad or misformatted paramaters"
    *
    */
    public function register($email, $password, $first_name, $last_name) {
        $r = new \stdClass(); // for building return value, array of
        $email = strtolower(trim($email));
        $email = strtolower(trim($email));
        $hash = PW_HASH;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            throw new clsApiError(500, "200", "Email address is not valid");
        if (strlen(trim($password)) == 0)
            throw new clsApiError(500, "201", "Password is empty");
        if (strlen(trim($first_name)) == 0)
            throw new clsApiError(500, "202", "First Name is required");
        if (strlen(trim($last_name)) == 0)
            throw new clsApiError(500, "203", "Last Name is required");

        try {
            // does user with this email already exists?
            $sql = " SELECT * FROM `User` WHERE
                    email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $rows = $stmt->get_result();
            if ($rows->num_rows > 0) {
                throw new clsApiError(500, "204", "User Already Exists");
            }

            // add this user
            $sql = "INSERT INTO `User` SET 
                      email = ?,
                      password = sha2(concat(?,?),256),
                      first_name = ?,
                      last_name = ?
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sssss", $email, $hash, $password, $first_name, $last_name);
            $stmt->execute();

        } catch (Exception $e) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }

        $r->user_id = $stmt->insert_id;
        $r->email = $email;
        $r->first_name = $first_name;
        $r->last_name = $last_name;

        $this->log("register", "{$email}, ********, {$first_name}, {$last_name}", $r);

        return json_encode($r);
    }


    /*
    *
    * login
    *
    * Implements the 'login' method. Registers a User.
    *
    * Pass in a JSON object consisting of three strings, email, password, first_name, and last_name e.g.:
    * {
    * “email”:” info@datechnologies.co ”, “password”:”Test123”, “first_name”:”John”, “last_name”:”Doe”
    * }
    *
    *
    *
    * @param   string   email   The user's Email Address
    * @param   string   password   The user's Password
    * @return  string  The JSON-formatted output
    *
    * @throws clsApiError
    *
    * code: Error
    * message: "user already exists", "bad or misformatted paramaters"
    *
    */
    public function login($email, $password) {
        $r = new \stdClass(); // for building return value, array of objects

        $email = strtolower(trim($email));
        $hash = PW_HASH;

        try {
            $sql = " SELECT * FROM `User` WHERE
                    email = ? AND
                    SHA2(CONCAT(?,?),256) = password";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sss", $email, $hash, $password);
            $stmt->execute();
            $rows = $stmt->get_result();
            if ($user = $rows->fetch_assoc()) {
                $r->user_id = $user['idUser'];
                $r->email = $user['email'];
                $r->first_name = $user['first_name'];
                $r->last_name = $user['last_name'];
            } else {
                throw new clsApiError(500, "102", "Invalid Login");
            }
        } catch (Exception $e) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }


        $this->log("login", "{$email}, ********", $r);


        return json_encode($r);
    }

    /*
    *
    * view_messages
    *
    * Implements the 'view_messages' method. Registers a User.
    *
    *
    * @param   $user_id_1   The First User
    * @param   $user_id_2   The Second User
    * @return  string  The JSON-formatted output
    *
    * @throws clsApiError
    *
    * code: Error
    * message: "user already exists", "bad or misformatted paramaters"
    *
    */
    public function view_messages($user_id_a, $user_id_b) {

        $r = new \stdClass(); // for building return value, array of objects
        $r->messages = array();

        try {
            // validate
            $check = $this->getUser($user_id_a);
            if ($check === NULL)
                throw new clsApiError(500, "103", "user_id_1 was not found");
            $check = $this->getUser($user_id_b);
            if ($check === NULL)
                throw new clsApiError(500, "103", "user_id_2 was not found");

            // all good, send the message
            $sql = "SELECT
                        *,
                        UNIX_TIMESTAMP(ts) as epoch
                        
                        FROM `Message` WHERE 
                      fromUser_idUser = ? AND
                      toUser_idUser = ?
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ii", $user_id_a, $user_id_b);

            $stmt->execute();
            $rows = $stmt->get_result();
            while ($user = $rows->fetch_assoc()) {
                $o = new \stdClass(); // each message is an object
                $o->message_id = $user['idMessage'];
                $o->sender_user_id = $user['fromUser_idUser'];
                $o->message = $user['message'];
                $o->epoch = $user['epoch'];

                $r->messages[] = $o; // add to return array of objects
            }

        } catch (Exception $e) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }

        $this->log("view_messages", "{$user_id_a}, {$user_id_b}", $r);

        // success
        return json_encode($r);
    }


    /*
    *
    * send_message
    *
    * Implements the 'view_messages' method. Registers a User.
    *
    *
    * @param   string   sender_user_id   The from user
    * @param   string   receiver_user_id   The to user
    * @return  string   message The message to be sent
    * @return  string  The JSON-formatted output
    *
    * @throws clsApiError
    *
    * code: Error
    * message: "user already exists", "bad or misformatted paramaters"
    *
    */
    public function send_message($sender_user_id, $receiver_user_id, $message) {
        $r = new \stdClass(); // for building return value, array of objects

        try {
            // validate
            $fromUser = $this->getUser($sender_user_id);
            if ($fromUser === NULL)
                throw new clsApiError(500, "105", "sender_user_id was not found");
            $toUser = $this->getUser($receiver_user_id);
            if ($toUser === NULL)
                throw new clsApiError(500, "106", "receiver_user_id was not found");

            // all good, send the message
            $sql = "INSERT INTO `Message` SET 
                      fromUser_idUser = ?,
                      toUser_idUser = ?,
                      ts = NOW(),
                      message = ?
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("iis", $sender_user_id, $receiver_user_id, $message);
            $stmt->execute();

        } catch (Exception $e) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }

        // success
        $r->success_code = 200;
        $r->success_title = "Message Sent";
        $r->success_message = "Message was sent succesfully";

        $this->log("send_message", "{$sender_user_id}, {$receiver_user_id}, {$message}", $r);

        return json_encode($r);
    }

    /*
    *
    * list_all_users
    *
    * Implements the 'view_messages' method. Registers a User.
    *
    *
    * @param   requester_user_id    string   The requestor user id
    * @return  string  The JSON-formatted output
    *
    * @throws clsApiError
    *
    * code: Error
    * message: "user already exists", "bad or misformatted paramaters"
    *
    * example return:
    *  * "users":[
    * {
    * "user_id":1, "email":"ppeck@datechnologies.co", "first_name":"Preston", "last_name":"Peck"
    * }, {
    * "user_id":2, "email":"jgreen@datechnologies.co", "first_name":"Jake ",
    * "last_name":"Green" }
    * ] }
    *
    */
    public function list_all_users($requester_user_id) {
        $r = new \stdClass(); // for building return value, array of objects
        $r->users = array();

        // is this a valid user?
        $check = $this->getUser($requester_user_id);
        if ($check === NULL)
            throw new clsApiError(500, "107", "requester_user_id was not found");

        // fetch all other users besides this one
        try {
            $sql = " SELECT * FROM `User` WHERE
                    `User`.idUser <> ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $requester_user_id);
            $stmt->execute();
            $rows = $stmt->get_result();
            while ($user = $rows->fetch_assoc()) {
                $o = new \stdClass(); // each user is an object
                $o->user_id = $user['idUser'];
                $o->email = $user['email'];
                $o->first_name = $user['first_name'];
                $o->last_name = $user['last_name'];

                $r->users[] = $o; // add to return array of objects
            }
        } catch (Exception $e) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }
        $this->log("lsit_all_users", $requester_user_id, $r);
        return json_encode($r);
    }


    /*
     *
     * Fetches a user by idUser
     *
     * @param int   idUser
     * @return array fields from User table or NULL if isUser is not found
     *
     */
    protected function getUser($idUser) {
        try {
            $sql = " SELECT * FROM `User` WHERE
                    `User`.idUser = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("i", $idUser);
            $stmt->execute();
            $rows = $stmt->get_result();
            if ($user = $rows->fetch_assoc())
                return $user;
            else
                return NULL;
        } catch (Exception $e) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }

        return json_encode($r);
    }

    /*
     *
     * Add log entries
     *
     * @param int   idUser
     * @param string   request
     * @param string   reply
     * @return array fields from User table or NULL if isUser is not found
     *
     */
    protected function log($method, $request, $reply) {
        if (is_object($reply)) $reply = json_encode($reply);
        try {
            $sql = "
                INSERT INTO `Log` SET  
                  idUser = ?,
                  method = ?,
                  request = ?,
                  reply = ?,
                  ts = NOW()
            ";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("isss", $idUser, $method, $request, $reply);
            $stmt->execute();

            // TODO: expire old log entries?

        } catch (Exception $e) {
            throw new clsApiError(500, "000", "Internal Server Error");
        }
    }
}