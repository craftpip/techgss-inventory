<?php

return array(
    '_root_' => 'welcome/index', // The default route
    '_404_' => 'welcome/404', // The main 404 route
   'aboutview' => 'about/hello',
   'contact' => 'templ/',
   'admin' => 'admin/login',
    'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
