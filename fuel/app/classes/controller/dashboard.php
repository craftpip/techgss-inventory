<?php 



class Controller_Dashboard extends Controller {

    public static function _init() {
        // this is called upon loading the class
    }

    public function action_index() {
        if(!Auth::check()){
            Fuel\Core\Response::redirect('login');
        }
        
        $v = View::forge('template.mustache');
        $v->header = View::forge('header');
        $v->footer = View::forge('footer');
        $v->navigation = View::forge('navigation');
        return $v;
    }
}