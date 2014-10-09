<?php

class Model_Customer extends \Model {

    public static function get_customer() {
        $select_list = array('customer_id', 'customer_type', 'customer_name', 'customer_desc', 'currency',
            'tax', 'address', 'company_id', 'cdate');

        return \DB::select_array($select_list)
                        ->from('customer')->execute()->as_array();
    }

    public static function get_customer_by_id($id) {
        $select_list = array('customer_id', 'customer_type', 'customer_name', 'customer_desc', 'currency',
            'tax', 'address', 'company_id', 'cdate');
        return \DB::select_array($select_list)
                        ->from('customer')->where('customer_id', $id)->execute()->as_array();
    }
    
    public static function get_customer_by_company($id) {
        $select_list = array('customer_id', 'customer_type', 'customer_name', 'customer_desc', 'currency',
            'tax', 'address', 'cdate');
        return \DB::select_array($select_list)
                        ->from('customer')->where('company_id', $id)->execute()->as_array();
    }

    public static function set_customer($result_data = array()) {
        list($insert_id, $rows_affected) = DB::insert('customer')->set(array(
                    'customer_name' => $result_data['customer_name'],
                    'customer_desc' => $result_data['customer_desc'],
                    'customer_type' => $result_data['customer_type'],
                    'currency' => $result_data['currency'],
                    'tax' => $result_data['tax'],
                    'address' => $result_data['address'],
                    'company_id' => $result_data['company_id'],
                    'create_by_id' => $result_data['create_by_id'],
                    'cdate' => date('H:m:d'),
                ))->execute();
        return $insert_id;
    }

    public static function update_customer($result_data = array()) {
        $result = \DB::update('customer')
                ->value('customer_name', $result_data['customer_name'])
                ->value('customer_desc', $result_data['customer_desc'])
                ->value('customer_type', $result_data['customer_type'])
                ->value('currency', $result_data['currency'])
                ->value('tax', $result_data['tax'])
                ->value('address', $result_data['address'])
                ->value('company_id', $result_data['company_id'])
                ->value('create_by_id', $result_data['create_by_id'])
                ->where('customer_id', $result_data['customer_id'])
                ->execute();
        return $result;
    }

    public static function delete_customer($id) {
        $result = \DB::update('customer')
                ->value('status', 'Delete')
                ->where('customer_id', $id)
                ->execute();
        return $result;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

