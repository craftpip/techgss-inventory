<?php
// a MySQL driver configuration
return array(
'development' => array(
    'type'           => 'mysql',
    'connection'     => array(
        'hostname'       => 'localhost',
        'port'           => '3306',
        'database'       => 'tginventory',
        'username'       => 'root',
        'password'       => '',
        'persistent'     => false,
        'compress'       => false,
    ),
    'identifier'     => '`',
    'table_prefix'   => '',
    'charset'        => 'utf8',
    'enable_cache'   => false,
    'profiling'      => false,
    'readonly'       => false,
),

// a PDO driver configuration, using PostgreSQL
'production' => array(
    'type'           => 'pdo',
    'connection'     => array(
        'dsn'            => 'pgsql:host=localhost;dbname=tginventory',
        'username'       => 'root',
        'password'       => '',
        'persistent'     => false,
        'compress'       => false,
    ),
    'identifier'     => '"',
    'table_prefix'   => '',
    'charset'        => 'utf8',
    'enable_cache'   => true,
    'profiling'      => false,
    'readonly'       => array('slave1', 'slave2', 'slave3'),
),

'slave1' => array(
    // configuration of the first production readonly slave db
),

'slave2' => array(
    // configuration of the second production readonly slave db
),

'slave3' => array(
    // configuration of the third production readonly slave db
),
)
?>