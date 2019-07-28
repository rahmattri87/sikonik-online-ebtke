<?php
use yii\helpers\Url;
use kartik\grid\GridView;

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
        'class' => 'kartik\grid\ExpandRowColumn',
        'width' => '50px',
        'value' => function ($model, $key, $index, $column) {
            return GridView::ROW_COLLAPSED;
        },
        'detail' => function ($model, $key, $index, $column) {
            return ''; //Yii::$app->controller->renderPartial('_expand-row-details', ['model' => $model]);
        },
        'headerOptions' => ['class' => 'kartik-sheet-style'],
        'expandOneOnly' => true,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_sub_indikator',
        'label'=>'Sub Indikator',
        'vAlign'=>'middle',    
    ],    
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'isi_indikator', 
        'label' => 'Nama Indikator',
        'vAlign'=>'middle',
        'hAlign'=>'middle',
        'format'=>'html',   
        'contentOptions' => [
            'style'=>'max-width:800px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
        'group'=>true,      
    ],          
    
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_indikator',
    //     'label'=>'Indikator',
    //     'vAlign'=>'middle',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'uraian_keberhasilan',
        'format'=>'html',   
        'contentOptions' => [
            'style'=>'max-width:800px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'target',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'bobot_capaian',            
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