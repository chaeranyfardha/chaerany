<?php
return [
    'name' => 'CHAERANY BLOG',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module'
        ]
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/index',  'site/logout',  'site/login', '*',
            'admin/*'
        ]
    ]
];
