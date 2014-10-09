<?php

class Model_Company extends \Model {

    public static function get_company() {
        return \DB::select('company_id', 'company_name', 'create_id', 'status', 'cdate')
                        ->from('company')->execute()->as_array();
    }

    public static function get_company_by_id($id) {
        return \DB::select('company_name', 'create_id', 'status', 'cdate')
                        ->from('company')->execute()->where('company_id', $id)->as_array();
    }

    public static function set_company($result_data = array()) {
        list($insert_id, $rows_affected) = DB::insert('company')->set(array(
                    'company_name' => $result_data['company_name'],
                    'create_id' => $result_data['create_id'],
                    'cdate' => date('H:m:d'),
                ))->execute();
        return $insert_id;
    }

    public static function update_company($result_data = array()) {
        $result = \DB::update('company')
                ->value('company_name', $result_data['company_name'])
                ->where('company_id', $result_data['company_id'])
                ->execute();
        return $result;
    }

    public static function delete_company($id) {
        $result = \DB::update('company')
                ->value('status', 'Delete')
                ->where('company_id', $result_data['company_id'])
                ->execute();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

