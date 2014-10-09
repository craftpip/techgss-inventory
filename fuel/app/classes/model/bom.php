<?php

class Model_Bom extends \Model {

    public static function get_bom() {
        return \DB::select('bom_id', 'bom_name', 'bom_desc', 'company_id','create_by_id','status', 'cdate')
                        ->from('bom')->execute()->as_array();
    }

    public static function get_bom_by_company($id) {
         return \DB::select('bom_id', 'bom_name', 'bom_desc','create_by_id','status', 'cdate')
                        ->from('bom')->where('company_id', $id)->execute()->as_array();
    }
    
    public static function get_bom_by_id($id) {
         return \DB::select( 'bom_name', 'bom_desc', 'company_id','create_by_id','status', 'cdate')
                        ->from('bom')->where('bom_id', $id)->execute()->as_array();
    }

    public static function set_bom($result_data = array()) {
        list($insert_id, $rows_affected) = DB::insert('bom')->set(array(
                    'bom_name' => $result_data['bom_name'],
                    'bom_desc' => $result_data['bom_desc'],
                    'company_id' => $result_data['company_id'],
                    'cdate' => date('H:m:d'),
                ))->execute();
        return $insert_id;
    }

    public static function update_bom($result_data = array()) {
        $result = \DB::update('bom')
                ->value('bom_name', $result_data['bom_name'])
                ->value('bom_desc', $result_data['bom_desc'])
                ->value('company_id', $result_data['company_id'])
                ->where('bom_id', $result_data['bom_id'])
                ->execute();
        return $result;
    }

    public static function delete_bom($id) {
        $result = \DB::update('category')
                ->value('status', 'Delete')
                ->where('category_id', $result_data['category_id'])
                ->execute();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

