<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Controller_Api_Company extends Controller {

    /**
     * The basic welcome message
     *
     * @access  public
     * @return  Response
     */
    public static function _init() {
        // this is called upon loading the class
    }
    public function action_index(){
        return false;
    }
    public function action_i($id = null) {
        switch (Input::method()) {
            case 'GET':
                if (isset($id)) {
                    return json_encode(Model_Company::get_company_by_id($id));
                } else {
                    return json_encode(Model_Company::get_company());
                }
                echo 'GET';
                break;
            case 'DELETE':
                return json_encode(Model_Company::delete_company($id));
                echo 'DELETE';
                break;
            case 'POST':
                $data = Input::post();
                
                if (isset($data['company_id'])) {
                    
                    return json_encode(Model_Company::update_company(array(
                                'company_name' => $data['company_name'],
                                'company_id' => $data['company_id']
                    )));
                    
                } else {
                    
                    list(,$create_id) = Auth::get_user_id();
                    return json_encode(Model_Company::set_company(array(
                                'company_name' => $data['company_name'], 
                                'create_id' => $create_id
                    )));
                    break;
                }
        }
    }
}

