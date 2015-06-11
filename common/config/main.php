<?php
//Yii::setAlias('@common', dirname(__DIR__));
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'es-ES', // spanish
    'modules' => [
        'gridview' =>  [
        'class' => '\kartik\grid\Module'
        ]
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
    ],
];
