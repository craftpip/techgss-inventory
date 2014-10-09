<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_Item extends \Model {

    public static function get_item(){
           return \DB::select('*')
                        ->from('item')->execute()->as_array();
    }
    
    public static function get_item_by_id(){
           return \DB::select('*')
                        ->from('item')->execute()->as_array();
    }
}
