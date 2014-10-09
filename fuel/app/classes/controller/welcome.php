<?php


class Controller_Welcome extends Controller {

    public static function _init() {
        
    }

    public function action_index() {
        echo 'Welcome to invest';
    }

    public function action_hello() {
        echo 'Welcome to invest hello';
        $data = array(
            array(
                'id' => '1',
                'name' => 'gooss'
            ),
            array(
                'id' => '2',
                'name' => 'ss'
            ),
            array(
                'id' => '3',
                'name' => 'ss'
            )
        );
//        list($insert_id, $rows_affected) = DB::insert('demo')->set(array(
//                    'data' => json_encode($data),
//                    'value' => 'asdf',
//                ))->execute();
//        echo $insert_id;
        $dt = DB::select('*')->from('demo')->execute()->as_array();
        // echo '<br>'.$dt[2]['data'];
        $value = json_decode($dt[2]['data']);
        // print_r($value);
        echo $value[0]->name;
    }

    /**
     * The 404 action for the application.
     *
     * @access  public
     * @return  Response
     */
    public function action_h2() {
        echo 'Welcome to invest hello';
        $data = array(
            array(
                'id' => '1',
                'name' => 'gooss'
            ),
            array(
                'id' => '2',
                'name' => 'ss'
            ),
            array(
                'id' => '3',
                'name' => 'ss'
            )
        );
//        list($insert_id, $rows_affected) = DB::insert('demo')->set(array(
//                    'data' => serialize($data),
//                    'value' => 'asdf',
//                ))->execute();
//        echo $insert_id;
        $dt = DB::select('*')->from('demo')->execute()->as_array();
        //  echo '<br>'.$dt[2]['data'];
        $value = unserialize($dt[3]['data']);
        print_r($value);
        // echo $value[0]['name']; boniface
    }

public static function action_demoadd(){

}
}
