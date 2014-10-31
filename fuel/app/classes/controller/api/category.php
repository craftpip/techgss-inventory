<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Category extends Controller {

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

    public function action_i($id = null){
        switch (Input::method()) {
            case 'GET':
                if (isset($id)) {
                    return json_encode(Model_Category::get_category_by_id($id));
                } else {
                    return json_encode(Model_Category::get_category());
                }
                break;
            case 'DELETE':
                return json_encode(Model_Category::delete_category($id));
                break;
            case 'POST':
                $data = Input::post();

                if (isset($data['category_id'])) {
                    return json_encode(Model_Category::update_category(array(
                                'category_name' => $data['category_name'],
                                'category_desc' => $data['category_desc'],
                                //'company_id' => $data['company_id'],
                                'company_id' => '1',
                                'category_id' => $data['category_id']
                    )));
                } else {
                    return json_encode(Model_Category::set_category(array(
                                'category_name' => $data['category_desc'],
                                'category_desc' => $data['category_desc'],
                                'company_id' => 1
                    )));
                    break;
                }
        }
    }
    public function action_bycompany($id){
        return json_encode(Model_Category::get_category_by_company($id));
    }
}
