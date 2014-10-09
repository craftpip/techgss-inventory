<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Bom extends Controller {

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
                    return json_encode(Model_Bom::get_bom_by_id($id));
                } else {
                    return json_encode(Model_Bom::get_bom());
                }
                break;
            case 'DELETE':
                return json_encode(Model_Bom::delete_ca($id));
                break;
            case 'POST':
                $data = Input::post();

                if (isset($data['bom_id'])) {
                    return json_encode(Model_Bom::update_bom(array(
                               'bom_name' => $data['bom_name'],
                                'bom_desc' => $data['bom_desc'],
                                'company_id' => $data['company_id'],
                                'create_by_id' => $data['create_by_id'],
                                'bom_id' => $data['bom_id']
                    )));
                } else {
                    return json_encode(Model_Bom::set_bom(array(
                                'bom_name' => $data['bom_name'],
                                'bom_desc' => $data['bom_desc'],
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
