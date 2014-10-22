<?php 



class Controller_Dashboard extends Controller {

    public static function _init() {
        // this is called upon loading the class
    }

    public function action_index() {
        if(!Auth::check()){
            Fuel\Core\Response::redirect('dashboard/login');
        }
            
        $v = View::forge('template.mustache');
        $v->header = View::forge('header');
        $v->footer = View::forge('footer');
        $v->navigation = View::forge('navigation');
        return $v;
    }
    public function action_login(){
//        return Fuel\Core\Input::method();
        if(Fuel\Core\Input::method() == 'POST'){
            $a = Fuel\Core\Input::post();
            if(Auth::login($a['username'], $a['password'])){
                Response::redirect('dashboard');
            }else{
                Response::redirect('dashboard/login?error=yes');
            }
        }else{
            return View::forge('login');
        }
    }
}