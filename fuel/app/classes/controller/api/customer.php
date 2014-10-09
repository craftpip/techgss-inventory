<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Customer extends Controller {

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public static function _init() {
        // this is called upon loading the class
    }

    public function action_index($id = null) {
        switch (Input::method()) {
            case 'GET':
                if (isset($id)) {
                    return json_encode(Model_Customer::get_customer_by_id($id));
                } else {
                    return json_encode(Model_Customer::get_customer());
                }
                break;
            case 'DELETE':
                return json_encode(Model_Customer::delete_customer($id));
                break;
            case 'POST':
                $data = Input::post();

                if (isset($data['customer_id'])) {
                    return json_encode(Model_Customer::update_customer(array(
                                'customer_name' => $data['customer_name'],
                                'customer_desc' => $data['customer_desc'],
                                'customer_type' => $data['customer_type'],
                                'currency' => $data['currency'],
                                'tax' => $data['tax'],
                                'address' => $data['address'],
                                'company_id' => $data['company_id'],
                                'create_by_id' => $data['create_by_id'],
                                'customer_id' => $data['customer_id']
                    )));
                } else {
                    return json_encode(Model_Customer::set_customer(array(
                                'customer_name' => $data['customer_name'],
                                'customer_desc' => $data['customer_desc'],
                                'customer_type' => $data['customer_type'],
                                'currency' => $data['currency'],
                                'tax' => $data['tax'],
                                'address' => $data['address'],
                                'company_id' => $data['company_id'],
                                'create_by_id' => $data['create_by_id']
                    )));
                    break;
                }
        }
    }

    public function action_bycompany($id) {
        return json_encode(Model_Vehical::get_group_by_company($id));
    }

}
