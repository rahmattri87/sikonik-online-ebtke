<?php
use yii\helpers\Url;
use backend\models\D1r3kt0r4t;
use backend\models\Subd1r3kt0r4t;
use backend\models\Subd1r3kt0r4tSearch;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_subdir',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nm_subdir',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'kd_direktorat',
    //     'vAlign'=>'middle',
    //     'hAlign'=>'middle',
    //     'width'=>'310px',
    //         'value'=>function ($model, $key, $index, $widget) { 
    //             return $model->kd_direktorat;
    //         },
    //         'filterType'=>GridView::FILTER_SELECT2,
    //         'filter'=>ArrayHelper::map(Subd1r3kt0r4t::find()->orderBy('kd_direktorat')->asArray()->all(), 'kd_direktorat', 'kd_direktorat'), 
    //         'filterWidgetOptions'=>[
    //             'pluginOptions'=>['allowClear'=>true],
    //         ],
    //         'filterInputOptions'=>['placeholder'=>'Direktorat'],
    //         'group'=>true,  // enable grouping
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nm_direktorat',        
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   