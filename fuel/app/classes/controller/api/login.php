<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Login extends Controller {

    public static function action_index() {
        if (Input::method() == 'POST' OR Input::is_ajax()) {
            $val = Validation::forge('login_valid');
            $val->add('login-username', 'Name')
                    ->add_rule('required');
            $val->add('login-password', 'Password')
                    ->add_rule('required');
            $val->set_message('required', ':label field blank');
            if ($val->run()) {

                if (Auth::forge('simpleauth')->login(Input::post('login-username'), Input::post('login-password'))) {
                    Model_users::set_lastlogin(Input::post('login-username'));
                    $arrayName = array('status' => true,
                        'group' => 1);
                    $view = json_encode($arrayName);
                } else {
                    $arrayName = array('status' => false,
                        'validation' => $arrayName = array(
                    'logininvalid' => 'Invalid Login',
                        ),
                    );
                    $view = json_encode($arrayName);
                }
            } else {
                $arrayName = array('status' => false,
                    'validation' => $arrayName = array(
                'loginusername' => $val->error('login-username') ? $val->error('login-username')->get_message() : null,
                'loginpassword' => $val->error('login-password') ? $val->error('login-password')->get_message() : null,
                    ),
                );
                $data = json_encode($arrayName);
                $view = $data;
            }
        } else {
            $view = 'no input';
        }
        return $view;
    }

    public static function action_check() {
        if (Auth::forge('simpleauth')->check()) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function action_login() {
        
    }

    public static function action_logout() {
        Auth::forge('simpleauth')->logout();
        //Response::redirect('/');
        return 2;
    }

    public static function action_getuserdetails() {
        //Auth::forge('simpleauth')->check()
        //Auth::forge('simpleauth')->get
    }

}
