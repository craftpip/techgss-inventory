<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Vehical extends Controller {

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
                    return json_encode(Model_Vehical::get_vehical_by_id($id));
                } else {
                    return json_encode(Model_Vehical::get_vehical());
                }
                break;
            case 'DELETE':
                return json_encode(Model_Vehical::delete_($id));
                break;
            case 'POST':
                $data = Input::post();

                if (isset($data['vehical_id'])) {
                    return json_encode(Model_Vehical::update_vehical(array(
                               'vehical_name' => $data['vehical_name'],
                                'vehical_desc' => $data['vehical_desc'],
                                'company_id' => $data['company_id'],
                                'create_by_id' => $data['create_by_id'],
                                'vehical_id' => $data['vehical_id']
                    )));
                } else {
                    return json_encode(Model_Vehical::set_vehical(array(
                                'vehical_name' => $data['vehical_name'],
                                'vehical_desc' => $data['vehical_desc'],
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
