<?php

class Model_Group extends \Model {

    public static function get_group() {
        return \DB::select('group_id', 'group_name', 'group_desc', 'company_id', 'create_by_id','cdate')
                        ->from('group')->where('status', 'Active')->execute()->as_array();
    }

    public static function get_group_by_company($id) {
        return \DB::select('group_id', 'group_name', 'group_desc', 'create_by_id','cdate')
                        ->from('group')->where('status', 'Active')->where('company_id', $id)->execute()->as_array();
    }
    
    public static function get_group_by_id($id) {
       return \DB::select('group_id','group_name', 'group_desc', 'company_id', 'create_by_id','cdate')
                        ->from('group')->where('status', 'Active')->where('group_id', $id)->execute()->as_array();
    }

    public static function set_group($result_data = array()) {
        list($insert_id, $rows_affected) = DB::insert('group')->set(array(
                    'group_name' => $result_data['group_name'],
                    'group_desc' => $result_data['group_desc'],
                    'company_id' => $result_data['company_id'],
                    'create_by_id' => $result_data['create_by_id'],
                    'cdate' => date('H:m:d'),
                ))->execute();
        return $insert_id;
    }

    public static function update_group($result_data = array()) {
        $result = \DB::update('group')
                ->value('group_name', $result_data['group_name'])
                ->value('group_desc', $result_data['group_desc'])
                ->value('company_id', $result_data['company_id'])
                ->value('create_by_id', $result_data['create_by_id'])
                ->where('group_id', $result_data['group_id'])
                ->execute();
        return $result;
    }

    public static function delete_group($id) {
        $result = \DB::update('group')
                ->value('status', 'Delete')
                ->where('group_id', $id)
                ->execute();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

