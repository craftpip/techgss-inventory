<?php

class Model_Users extends \Model {

    public static function get_results() {
// Database interactions
        return \DB::select()->from('users')->execute()->as_array();
    }

    public static function get_results_find($id) {
// Database interactions        
        return \DB::select()->from('users')->where('user_id', $id)->execute()->as_array();
    }

    public static function get_results_last_id() {
// Database interactions        
        return \DB::select('user_id')->from('users')->order_by('user_id', 'desc')->limit(1)->execute()->as_array();
    }

    public static function get_email_exist($id) {
// Database interactions        
        return \DB::select(DB::expr('COUNT(email) as count'))->from('users')->where('email', '' . $id . '')->execute()->as_array();
    }

    public static function get_username_exist($id) {
// Database interactions        
        return \DB::select(DB::expr('COUNT(username) as count'))->from('users')->where('username', '' . $id . '')->execute()->as_array();
    }

    public static function set_result($result_data = array()) {
        
    }

    public static function set_lastlogin($id){
         $result = \DB::update('users')
                ->value("last_login", '' . date('H:m:d') . '')
                ->where('username', '=', $id)
                ->execute();
        return $result;
    }
    
    public static function update_result($result_data = array()) {
// Database interactions
         $result = \DB::update('users')
                ->value("mobileno", '' . $result_data['signup-mobileno'] . '')
                ->value("group", '' . $result_data['signup-group'] . '')
                ->value("address", '' . $result_data['signup-address'] . '')
                ->where('user_id', '=', $result_data['user_id'])
                ->execute();
        return $result;
    }

    public static function update_rest_result($result_data = array()) {
// Database interactions
        $result = \DB::update('users')
                ->value("mobileno", '' . $result_data['signup-mobileno'] . '')
                ->value("group", '' . $result_data['signup-group'] . '')
                ->value("address", '' . $result_data['signup-address'] . '')
                ->where('user_id', '=', $result_data['user_id'])
                ->execute();
        return $result;
    }

    public static function delete_result($id) {
        return \DB::delete('users')->where('user_id', '=', $id)->execute();
    }

}
?>