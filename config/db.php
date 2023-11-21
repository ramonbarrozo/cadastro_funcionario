<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=localhost;port=5433;dbname=db_funcionarios',
    'username' => 'postgres',
    'password' => '0000',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql'=> [
            'class'=>'yii\db\pgsql\Schema',
            'defaultSchema' => 'public' // Altere se o seu esquema for diferente de 'public'
        ]
    ],
];

