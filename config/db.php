<?php

return [
    'class' => 'yii\db\Connection',
    // 'dsn' => 'pgsql:host=localhost;port=5432;dbname=rsud_id',
    // 'username' => 'postgres',
    // 'password' => 'postgres',
    // 'charset' => 'utf8',

    'dsn' => 'pgsql:host=192.168.254.21;port=5432;dbname=simrs_dev',
    'username' => 'postgres',
    'password' => '1satu2dua',
    'charset' => 'utf8',
    // 'schemaMap' => [
    //     'pgsql' => [
    //         'class' => 'yii\db\pgsql\Schema',
    //         'defaultSchema' => 'sso' //specify your schema here
    //     ]
    // ],

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
