<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller_Api_Login extends Controller {

    public static function action_index() {

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
