<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_User extends Controller {

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
                    return json_encode(Model_Users::get_results($id));
                } else {
                    return json_encode(Model_Users::get_results_find());
                }
                break;
            case 'DELETE':
                return json_encode(Model_Users::delete_result($id));
                break;
            case 'POST':
                $data = Input::post();

                if (isset($data['user_id'])) {
                    return json_encode(Model_Users::update_result(array(
                                'signup-mobileno' => $data['signup-mobileno'],
                                'signup-group' => $data['signup-group'],
                                'signup-address' => $data['signup-address'],
                                'user_id' => $data['user_id']
                    )));
                } else {
                    return $this->action_adduser();                  
                    break;
                }
        }
    }

    public function action_adduser() {
        $val = Validation::forge('signup_valid');
        $val->add('signup-username', 'name')
                ->add_rule('required');
        $val->add('signup-password', 'password')
                ->add_rule('required');
        $val->add('signup-address', 'address')
                ->add_rule('required');
        $val->add('signup-group', 'address')
                ->add_rule('required');
        $val->add('signup-email', 'your email id')
                ->add_rule('required')->add_rule('valid_email');
        $val->add('signup-mobileno', 'mobile number')
                ->add_rule('required')->add_rule('match_pattern', '`^[7-9][0-9]{9}$`i');

        $val->set_message('required', 'A valid :label is required');
        $val->set_message('valid_email', 'Invalid email address');
        $val->set_message('match_pattern', 'Invalid phone number');

        if ($val->run()) {
            $emailrt = Model_Users::get_email_exist(Input::post('signup-email'));
            $usernamert = Model_Users::get_username_exist(Input::post('signup-username'));

            if ($emailrt[0]['count'] == 0 && $usernamert[0]['count'] == 0) {
                if (Auth::forge('simpleauth')->create_user(Input::post('signup-username'), Input::post('signup-password'), Input::post('signup-email'), $group = 001, $profile_fields = array('circle_id' => Input::post('signup-circle'), 'mobileno' => Input::post('signup-mobileno')))) {

                    $usernamert = Model_Users::get_results_last_id();
                    $result = Model_Users::update_rest_result(array(
                                'signup-mobileno' => Input::post('signup-mobileno'),
                                'signup-group' => Input::post('signup-group'),
                                'signup-address' => Input::post('signup-address'),
                                'user_id' => $usernamert[0]['user_id']
                    ));

                    $arrayName = array('status' => true);
                    $view = json_encode($arrayName);
                } else {
                    $arrayName = array('status' => false);
                    $view = json_encode($arrayName);
                }
            } else {
                $arrayName = array('status' => false,
                    'validation' => $arrayName = array(
                'emailexit' => ($emailrt[0]['count'] == 0) ? null : 'Email Exist',
                'userexit' => ($usernamert[0]['count'] == 0) ? null : 'Username Exist',));
                $view = json_encode($arrayName);
            }
        } else {
            $arrayName = array('status' => false,
                'validation' => $arrayName = array(
            'name' => $val->error('signup-username') ? $val->error('signup-username')->get_message() : null,
            'password' => $val->error('signup-password') ? $val->error('signup-password')->get_message() : null,
            'email' => $val->error('signup-email') ? $val->error('signup-email')->get_message() : null,
            'group' => $val->error('signup-group') ? $val->error('signup-group')->get_message() : null,
            'mobile' => $val->error('signup-mobileno') ? $val->error('signup-mobileno')->get_message() : null,
            'password' => $val->error('signup-password') ? $val->error('signup-password')->get_message() : null,
            'address' => $val->error('signup-address') ? $val->error('signup-address')->get_message() : null,
                ),
            );
            $view = json_encode($arrayName);
        }
        return $view;
    }

}
