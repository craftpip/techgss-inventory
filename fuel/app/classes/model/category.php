<?php

class Model_Category extends \Model {

    public static function get_category() {
        return \DB::select('category_id', 'category_name', 'category_desc', 'company_id', 'cdate')
                        ->from('category')->execute()->as_array();
    }

    public static function get_category_by_company($id) {
        return \DB::select('category_id','category_name', 'category_desc', 'cdate')
                        ->from('category')->where('company_id', $id)->execute()->as_array();
    }
    
    public static function get_category_by_id($id) {
        return \DB::select('category_name', 'category_desc', 'company_id', 'cdate')
                        ->from('category')->where('category_id', $id)->execute()->as_array();
    }

    public static function set_category($result_data = array()) {
        list($insert_id, $rows_affected) = DB::insert('category')->set(array(
                    'category_name' => $result_data['category_name'],
                    'category_desc' => $result_data['category_desc'],
                    'company_id' => $result_data['company_id'],
                    'cdate' => date('H:m:d'),
                ))->execute();
        return $insert_id;
    }

    public static function update_category($result_data = array()) {
        $result = \DB::update('category')
                ->value('category_name', $result_data['category_name'])
                ->value('category_desc', $result_data['category_desc'])
                ->value('company_id', $result_data['company_id'])
                ->where('category_id', $result_data['category_id'])
                ->execute();
        return $result;
    }

    public static function delete_category($id) {
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

