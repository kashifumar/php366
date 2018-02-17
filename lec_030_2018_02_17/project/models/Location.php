<?php

require_once 'DBTrait.php';

class Location {

    use DBTrait;

    public static function get_countries() {
//        $obj_db = self::get_obj_db();      
        $obj_db = Location::get_obj_db();
//                                            alias
        $query_select = "select id, name country_name "
                . " from countries "
                . " order by name ";
        //mysql resource
        $result = $obj_db->query($query_select);
        if ($obj_db->errno) {
            throw new Exception(" Select Countries Error - $obj_db->error - $obj_db->errno");
        }

        if (!$result->num_rows) {
            throw new Exception("*Countries Not Found");
        }

        $countries = [];

        while ($data = $result->fetch_object()) {
            $countries[] = $data;
        }
        return $countries;
    }

    public static function get_states($country_id) {
        $obj_db = self::get_obj_db();
        $query = "select id, state_name "
                . " from states "
                . " where country_id = $country_id"
                . " order by state_name asc ";

//                echo($query);
//                die;
        $result = $obj_db->query($query);

        if(!$result->num_rows){
            throw new Exception("*No State(s) Found");
        }
        
        $states = [];

        //call to member function fetch_object on boolean
        //must a query error
        while ($state = $result->fetch_object()) {
            $states[] = $state;
        }
        return $states;
    }

    public static function get_cities($state_id) {
        $obj_db = self::get_obj_db();
        $query = "select id, name city_name "
                . " from cities "
                . " where state_id = $state_id"
                . " order by city_name asc ";

        $result = $obj_db->query($query);

        if(!$result->num_rows){
            throw new Exception("*No CIty(s) Found");
        }
        
        $cities = [];

        //call to member function fetch_object on boolean
        //must a query error
        while ($city = $result->fetch_object()) {
            $cities[] = $city;
        }
        return $cities;
    }
    

}
