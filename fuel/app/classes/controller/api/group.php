<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Group extends Controller {

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
        return 'this is index';
    }

    public function action_i($id = null) {
        switch (Input::method()) {
            case 'GET':
                if (isset($id)) {
                    return json_encode(Model_Group::get_group_by_id($id));
                } else {
                    return json_encode(Model_Group::get_group());
                }
                break;
            case 'DELETE':
                return json_encode(Model_Group::delete_group($id));
                break;
            case 'POST':
                $data = Input::post();

                if (isset($data['group_id'])) {
                    return json_encode(Model_Group::update_group(array(
                                'group_name' => $data['group_name'],
                                'group_desc' => $data['group_desc'],
                                'company_id' => '1',
                                'create_by_id' => '2',
//                                'company_id' => $data['company_id'],
//                                'create_by_id' => $data['create_by_id'],
                                'group_id' => $data['group_id']
                    )));
                } else {
                    return json_encode(Model_Group::set_group(array(
                                'group_name' => $data['group_name'],
                                'group_desc' => $data['group_desc'],
                                'company_id' => '1',
                                'create_by_id' => '2',
//                                'company_id' => $data['company_id'],
//                                'create_by_id' => $data['create_by_id'],
                    )));
                    break;
                }
        }
    }

    public function action_bycompany($id) {
        return json_encode(Model_Group::get_group_by_company($id));
    }

}
