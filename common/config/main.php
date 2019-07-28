<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [

        // // buat reCapthca
        // 'reCaptcha' => [
        //     'name' => 'reCaptcha',
        //     'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
        //     'siteKey' => '6LfnczUUAAAAABaxmM41B5IfQmIrVdrMWDE-H80q',
        //     'secret' => '6LfnczUUAAAAACfPcPQgj2FcN_U63rTYvWTMJH4O',
        // ],

    //     'view' => [
    //         'theme' => [
    //             'pathMap' => [
    //                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
    //             ],
    //         ],
    //    ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],

    // 'modules' => [
    //     'gridview' =>  [
    //         'class' => '\kartik\grid\Module'
    //     ],      
    // ],
];
