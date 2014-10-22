<?php

class Controller_login extends Controller {

    public static function _init() {
        
    }

    public static function action_index() {
        if (Fuel\Core\Input::method() == 'POST') {
            $a = Fuel\Core\Input::post();
            if (Auth::login($a['username'], $a['password'])) {
                Response::redirect('dashboard');
            } else {
                Response::redirect('login?error=yes');
            }
        } else {
            return View::forge('login');
        }
    }

    public function action_o() {
        if (Auth::check()) {
            Auth::logout();
        }
    }

}
