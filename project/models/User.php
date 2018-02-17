<?php

require_once 'DBTrait.php';

class User {

    use DBTrait;

    private $id;
    private $user_name;
    private $password;
    private $email;
    private $loggedin;
    protected $first_name;
    private $middle_name;
    private $last_name;
    private $contact_number;
    private $gender;
    private $date_of_birth;
    private $street_address;
    private $city_id;
    private $state_id;
    private $country_id;

    public function __construct() {
        $this->id = 0;
        $this->user_name = "";
        $this->password = "";
        $this->email = "";
        $this->loggedin = FALSE;
        $this->first_name = "";
        $this->middle_name = "";
        $this->last_name = "";
        $this->contact_number = "";
        $this->gender = "";
        $this->date_of_birth = "";
        $this->street_address = "";
        $this->city_id = 0;
        $this->state_id = 0;
        $this->country_id = 0;
    }

    public function __set($name, $value) {
        $method = "set$name";
        if (!method_exists($this, $method)) {
            throw new Exception("SET Property $name does not exist");
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = "get$name";
        if (!method_exists($this, $method)) {
            throw new Exception("GET Property $name does not exist");
        }
        return $this->$method();
    }

    private function setID(int $id) {

        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("*Invalid/Missing User ID");
        }
        $this->id = $id;
    }

    private function getID(): int {
        return $this->id;
    }

    private function getLoggedin(): bool {
        return $this->loggedin;
    }

    private function setEmail(string $email) {

        $reg = "/^([0-9a-zA-Z]([-.\q]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,4})$/";
        if (!preg_match($reg, $email)) {
            throw new Exception("*Invalid/Missing Email");
        }
        $this->email = $email;
    }

    private function getEmail(): string {
        return $this->email;
    }

    private function setUser_Name(string $user_name) {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $user_name)) {
            throw new Exception("*Invalid/Missing User Name");
        }
        $this->user_name = $user_name;
    }

    private function getUser_Name(): string {
        return $this->user_name;
    }

    private function setPassword(string $password) {
        $reg = "/^[a-z][a-z0-9]{5,15}$/i";
        if (!preg_match($reg, $password)) {
            throw new Exception("*Invalid/Missing Password");
        }

        $this->password = sha1($password);
    }

    private function getPassword(): string {
        return $this->password;
    }

    protected function setFirst_Name(string $first_name) {
        $first_name = trim($first_name);

        $reg = "/^[a-z]+$/i";

        if (!preg_match($reg, $first_name)) {
            throw new Exception("Invalid/Missing First Name");
        }
        $this->first_name = ucfirst(strtolower($first_name));
    }

    private function getFirst_Name(): string {
        return is_null($this->first_name) ? "" : $this->first_name;
    }

    private function setMiddle_Name(string $middle_name) {

        $middle_name = trim($middle_name);
        if (!empty($middle_name)) {
            $reg = "/^[a-z]+$/i";

            if (!preg_match($reg, $middle_name)) {
                throw new Exception("Invalid Middle Name");
            }
        }
        $this->middle_name = ucfirst(strtolower($middle_name));
    }

//    private function getMiddle_Name(): string {
    private function getMiddle_Name() {
        return $this->middle_name;
    }

    private function setLast_Name(string $last_name) {

        $last_name = trim($last_name);
        $reg = "/^[a-z]+$/i";

        if (!preg_match($reg, $last_name)) {
            throw new Exception("Invalid/Missing Last Name");
        }
        $this->last_name = ucfirst(strtolower($last_name));
    }

//    private function getLast_Name(): string {
    private function getLast_Name() {
        return $this->last_name;
    }

    private function setContact_Number(string $contact_number) {
        $contact_number = trim($contact_number);

        $reg = "/^\d{1,4}\-\d{3}\-\d{7}$/";

        if (!preg_match($reg, $contact_number)) {
            throw new Exception("Invalid/Missing Contact Number");
        }
        $this->contact_number = $contact_number;
    }

//    private function getContact_Number(): string {
    private function getContact_Number() {
        return $this->contact_number;
    }

    private function setGender(string $gender) {
        $genders = array("Male", "Female");
        if (!in_array($gender, $genders)) {
            throw new Exception("MIssing Gender");
        }

        $this->gender = $gender;
    }

//    private function getGender(): string {
    private function getGender() {
//        echo($this->gender);
//        die;
        return $this->gender;
    }

    private function setDate_Of_Birth(string $date_of_birth) {
        if (empty($date_of_birth)) {
            throw new Exception("*MIssing Date Of Birth");
        }
//        echo($date_of_birth);
//        die;
        $reg = "/^\d{2}\-\d{2}\-\d{4}$/";
        if (!preg_match($reg, $date_of_birth)) {
            throw new Exception("Invalid Date Format");
        }
        $date_parts = explode("-", $date_of_birth);
        list($day, $month, $year) = $date_parts;
//        if(!checkdate($date_parts[1], $date_parts[0], $date_parts[2])){
        if (!checkdate($month, $day, $year)) {
            throw new Exception("INvalid Date");
        }

        $this->date_of_birth = $date_of_birth;
    }

//    private function getDate_Of_Birth(): string {
    private function getDate_Of_Birth() {
        return $this->date_of_birth;
    }

    private function setStreet_Address(string $street_address) {
        $street_address = trim($street_address);

        if (strlen($street_address) < 10) {
            throw new Exception("Missing/Too Short Street Address");
        }
        $this->street_address = $street_address;
    }

//    private function getStreet_Address(): string {
    private function getStreet_Address() {
        return $this->street_address;
    }

    private function setCity(int $city_id) {
        $query = "select id from cities "
                . " where id = $city_id";

        $obj_db = $this->get_obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            throw new Exception("City missing");
        }
        $this->city_id = $city_id;
    }

    private function getCity(): string {
        $obj_db = $this->get_obj_db();
        $query = "select name from cities "
                . " where id = $this->city_id";
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            return "n/a";
        }
        $data = $result->fetch_object();
        return $data->name;
    }

    private function getCity_ID(): int {

        return $this->city_id;
    }

    private function setState(int $state_id) {
        $query = "select id from states "
                . " where id = $state_id";

        $obj_db = $this->get_obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            throw new Exception("State missing");
        }
        $this->state_id = $state_id;
    }

    private function getState(): string {
        $obj_db = $this->get_obj_db();
        $query = "select state_name from states "
                . " where id = $this->state_id";
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            return "n/a";
        }
        $data = $result->fetch_object();
        return $data->state_name;
    }

    private function getState_ID(): int {

        return $this->state_id;
    }

    private function setCountry(int $country_id) {
        $query = "select id from countries "
                . " where id = $country_id";

        $obj_db = $this->get_obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            throw new Exception("Country missing");
        }
        $this->country_id = $country_id;
    }

    private function getCountry(): string {
        $query = "select name from countries "
                . " where id = $this->country_id";
        $obj_db = $this->get_obj_db();
        $result = $obj_db->query($query);
        if (!$result->num_rows) {
            return "n/a";
        }
        $data = $result->fetch_object();
        return $data->name;
    }

//    private function getCountry_ID(): int {
    private function getCountry_ID() {
        return $this->country_id;
    }

    private function setProfile_Image($profile_image) {
        extract($profile_image);
        if ($error == 4) {
            throw new Exception('*File Missing');
        }

        $image_data = getimagesize($tmp_name);
        if (!$image_data) {
            throw new Exception('*Not a valid Image');
        }

        if ($size > 500000) {
            throw new Exception('*MAx File Size is 500 KB');
        }

        if ($type != 'image/jpeg') {
            throw new Exception('*Only Jpeg Allowed');
        }

        if ($type == 'image/jpeg' && $type != $image_data['mime']) {
            throw new Exception('*Corrupt Image');
        }

        $str_path = $_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users/userimages/' . $this->user_name . '/' . $this->user_name . '.jpg';
//        echo($str_path);
//        die;

        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/evs')) {

            if (!mkdir($_SERVER['DOCUMENT_ROOT'] . '/evs')) {
                throw new Exception('*Failed to create folder evs');
            }
        }

//        chmod($_SERVER['DOCUMENT_ROOT'] .  '/evs/', 0777);

        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366')) {

            if (!mkdir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366')) {
                throw new Exception('*Failed to create folder evs/php366');
            }
        }

        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project')) {

            if (!mkdir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project')) {
                throw new Exception('*Failed to create folder evs/php366/project');
            }
        }

        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users')) {

            if (!mkdir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users')) {
                throw new Exception('*Failed to create folder evs/php366/project/users');
            }
        }

        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users/userimages')) {

            if (!mkdir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users/userimages')) {
                throw new Exception('*Failed to create folder evs/php366/project/users/userimages');
            }
        }

        if (!is_dir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users/userimages/' . $this->user_name)) {

            if (!mkdir($_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users/userimages/' . $this->user_name)) {
                throw new Exception('*Failed to create folder evs/php366/project/users/userimages/' . $this->user_name);
            }
        }

        $result = move_uploaded_file($tmp_name, $str_path);
        if (!$result) {
            throw new Exception('*Failed to uplaod file');
        }



//        var_dump($image_data);
//        
//        echo('<pre>');
//        print_r($image_data);
//        echo('</pre>');
//        die;        
    }

    private function getProfile_Image() {
        $str_path = $_SERVER['DOCUMENT_ROOT'] . '/evs/php366/project/users/userimages/' . $this->user_name . '/' . $this->user_name . '.jpg';

        if (is_file($str_path)) {
            $img_src = 'http://' . $_SERVER['HTTP_HOST'] . '/evs/php366/project/users/userimages/' . $this->user_name . '/' . $this->user_name . '.jpg';
        } else {
            $img_src = 'http://' . $_SERVER['HTTP_HOST'] . '/evs/php366/project/users/userimages/no_img.gif';
        }

        return $img_src;
    }

    public function signup() {
        $obj_db = $this->get_obj_db();

//        $query_insert = "insert into users "
//                . " (id, email, user_name, password) "
//                . " values "
//                . " ( NULL, '$this->email', '$this->user_name', '$this->password')";

        $query_insert_user = "insert into users "
                . " values "
                . " ( NULL, '$this->email', '$this->user_name', '$this->password')";

        $obj_db->query($query_insert_user);
        if ($obj_db->errno) {
            throw new Exception("Insert New User Error - $obj_db->error - $obj_db->errno");
        }

        $user_id = $obj_db->insert_id;

        $query_inser_profile = " insert into userprofiles "
                . " (id, user_id) "
                . " values "
                . " (NULL, $user_id)";
        $obj_db->query($query_inser_profile);
        if ($obj_db->errno) {
            throw new Exception("Insert New Profile Error - $obj_db->error - $obj_db->errno");
        }
    }

    public function login($remember) {

        $obj_db = $this->get_obj_db();


//        $query_select_login = "select [column_names] from [table_name] [filter_rows]";
//        $query_select_login = "select * from users";
//        $query_select_login = "select id, email, user_name from users";
        $query_select_login = "select id, email, user_name "
                . " from users "
                . " where user_name = '$this->user_name' "
                . " and password = '$this->password' ";

        $result = $obj_db->query($query_select_login);
        if ($obj_db->errno) {
            throw new Exception("Select User Error - $obj_db->error - $obj_db->errno");
        }
        if ($result->num_rows == 0) {
            throw new Exception("*Login Failed");
        }
        /**
         * 2018_01_27
         */
        $user_data = $result->fetch_object();

        $this->id = $user_data->id;
        $this->email = $user_data->email;
        $this->user_name = $user_data->user_name;
        $this->password = "";

        $str_user = serialize($this);
        $_SESSION['obj_user'] = $str_user;

        if ($remember) {
            $expire = time() + (60 * 60 * 24 * 15);
            setcookie("obj_user", $str_user, $expire, "/");
//            setcookie("obj_user", $str_user, $expire, "/evs/php366/");
        }
        /**
         * 2018_01_27
         */
    }

    public function logout() {
        if (isset($_SESSION['obj_user'])) {
            unset($_SESSION['obj_user']);
        }
        if (isset($_COOKIE['obj_user'])) {
            setcookie("obj_user", "dasds", 1, "/");
//            setcookie("obj_user", "dasds", 1, "/evs/php366/");
        }
    }

    public function profile() {

        if ($this->id == 0) {
            throw new Exception("*You Must Login");
        }
        $obj_db = $this->get_obj_db();
        //        $query_select = "select id, email, user_name, signup_date_time, status "
        //                . " from users "
        //                . " left join userprofiles "
        //                . " on users.id = userprofiles.user_id "
        //                . " where users.id = $this->id";
        //alias
        //        $query_select = "select u.id user_id, u.email, u.user_name, u.signup_date_time, "
        //                . " u.status, up.id profile_id, up.user_id, up.first_name "
        //                . " from users u "
        //                . " left join userprofiles up "
        //                . " on u.id = up.user_id "
        //                . " where u.id = $this->id";
        /*
          $query_select = "select u.id user_id, u.email, u.user_name, u.signup_date_time, "
          . " up.id profile_id, up.user_id, up.first_name "
          . " from users u "
          . " join userprofiles up "
          . " inner join userprofiles up "
          . " left join userprofiles up "
          . " right join userprofiles up "
          . " on u.id = up.user_id "
          . " where u.id = $this->id";
         */
        $query_select = "select users.id user_id, "
                . " users.user_name, users.email, "
                . " up.id profile_id, up.first_name,  "
                . " up.middle_name, "
                . " up.last_name, up.gender, date_format(up.date_of_birth, '%d-%m-%Y') date_of_birth, "
                . " up.city_id, up.state_id, "
                . " up.country_id "
                . " from users "
                . " join userprofiles up "
                . " on users.id = up.user_id "
                . " where users.id = $this->id";
        //mysql resource
        $result = $obj_db->query($query_select);
        if ($obj_db->errno) {
            throw new Exception("Profile Select User Error - $obj_db->error - $obj_db->errno");
        }

        if (!$result->num_rows) {
            throw new Exception("*User Not Found");
        }

        $data = $result->fetch_object();

        $this->user_name = $data->user_name;
        $this->email = $data->email;
        $this->gender = $data->gender;
//        $this->date_of_birth = date("d-m-Y", strtotime($data->date_of_birth));
        $this->date_of_birth = $data->date_of_birth;
        $this->first_name = $data->first_name;
        $this->middle_name = $data->middle_name;
        $this->last_name = $data->last_name;
        $this->last_name = $data->last_name;
        $this->state_id = $data->state_id;
        $this->city_id = $data->city_id;
        $this->country_id = $data->country_id;
    }

    /*





      public function send_mail($subject, $msg) {
      //          mail($this->email, $subject, $msg);
      //        /**
      //         * https://www.sitepoint.com/advanced-email-php/
      //         * http://stackoverflow.com/questions/15250140/php-mail-header
      //         * https://www.tutorialspoint.com/php/php_sending_emails.htm
      //         * https://www.lifewire.com/how-to-send-email-with-extra-headers-in-php-1171196
      //         * http://www.htmlite.com/php029.php
      //         * https://css-tricks.com/sending-nice-html-email-with-php/
      //         * http://php.net/manual/en/function.mail.php
      // */
    /*
      $header = "To: The Receiver <$this->email>\n" .
      "From: The Sender <admin@php350.net>\n" .
      "MIME-Version: 1.0\n" .
      "Content-type: text/html; charset=iso-8859-1";
      mail($this->email, $subject, $msg, $header);
      }
     */

    public function update_profile() {
        $obj_db = $this->get_obj_db();

//        $date_parts = explode("-", $this->date_of_birth);
//        list($day, $month, $year) = $date_parts; 
//        $date_of_birth = "$year-$month-$day";
//        $ts_dob = mktime(0, 0, 0, $month, $day, $year);

        $ts_dob = strtotime($this->date_of_birth);

        $date_of_birth = date("Y-m-d", $ts_dob);


        $query_update = "update userprofiles set "
                . " first_name = '$this->first_name' "
                . ", middle_name = '$this->middle_name' "
                . ", last_name = '$this->last_name' "
                . ", contact_number = '$this->contact_number' "
                . ", gender = '$this->gender' "
                . ", date_of_birth = '$date_of_birth' "
                . ", country_id = '$this->country_id' "
                . ", state_id = '$this->state_id' "
                . ", city_id = '$this->city_id' "
                . " where user_id = $this->id";
//                echo($query_update);
//                die;
        $result = $obj_db->query($query_update);
        if ($obj_db->errno) {
            throw new Exception("Update Profile User Error - $obj_db->error - $obj_db->errno");
        }
    }

    public function update_password() {
        $obj_db = $this->get_db_conn();
        $query_update = "update users set "
                . " password = '$this->password' "
                . " where user_id = $this->id";

        $result = $obj_db->query($query_update);
        if ($obj_db->errno) {
            throw new Exception("Update Password Error - $obj_db->error - $obj_db->errno");
        }
    }

    public function update_profile_image($source_file) {
        
    }

}

?>