<?php
return [
    'modules' =>[
        'auth' => [
            'class' => 'common\modules\auth\Module',
        ],
    ],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',

        ],
        'authManager' => [
            'class' => 'yii\rbac\PhpManager',
        ],
    ],
    


];
