<?php

class Model_Vehical extends \Model {

    public static function get_vehical() {
        return \DB::select('vehical_id', 'vehical_name', 'vehical_desc', 'company_id','create_by_id','status', 'cdate')
                        ->from('vehical')->execute()->as_array();
    }

    public static function get_vehical_by_company($id) {
         return \DB::select('vehical_id', 'vehical_name', 'vehical_desc','create_by_id','status', 'cdate')
                        ->from('vehical')->where('company_id', $id)->execute()->as_array();
    }
    
    public static function get_vehical_by_id($id) {
        return \DB::select( 'vehical_name', 'vehical_desc', 'company_id','create_by_id','status', 'cdate')
                        ->from('vehical')->where('vehical_id', $id)->execute()->as_array();
    }

    public static function set_vehical($result_data = array()) {
        list($insert_id, $rows_affected) = DB::insert('vehical')->set(array(
                    'vehical_name' => $result_data['vehical_name'],
                    'vehical_desc' => $result_data['vehical_desc'],
                    'create_by_id' => $result_data['create_by_id'],
                    'company_id' => $result_data['company_id'],
                    'cdate' => date('H:m:d'),
                ))->execute();
        return $insert_id;
    }

    public static function update_vehical($result_data = array()) {
        $result = \DB::update('vehical')
                ->value('vehical_name', $result_data['vehical_name'])
                ->value('vehical_desc', $result_data['vehical_desc'])
                ->value('company_id', $result_data['company_id'])
                ->value('create_by_id', $result_data['create_by_id'])
                ->where('vehical_id', $result_data['vehical_id'])
                ->execute();
        return $result;
    }

    public static function delete_vehical($id) {
        $result = \DB::update('vehical')
                ->value('status', 'Delete')
                ->where('vehical_id', $result_data['vehical_id'])
                ->execute();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

