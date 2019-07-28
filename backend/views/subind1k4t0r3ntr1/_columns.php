<?php
use yii\helpers\Url;

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
        'attribute'=>'id_indikator',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'uraian_keberhasilan',        
        'label'=>'Uraian Keberhasilan Indikator',
        'contentOptions' => ['class' => 'text-left'],
        'headerOptions' => ['class' => 'text-center']
        // 'format'=>'html',   
        // 'contentOptions' => [
        //     'style'=>'max-width:1000px; overflow: auto; white-space: normal; word-wrap: break-word;'
        // ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'target',  
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['class' => 'text-center']  
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_indikator',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tri_wulan',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'capaian',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'uraian_keberhasilan_entri',
        'format'=>'html', 
        'contentOptions' => [
            'style'=>'max-width:800px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],        
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kendala',
        'format'=>'html', 
        'contentOptions' => [
            'style'=>'max-width:800px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'timeline',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'bobot_nilai',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'tahun',
        'contentOptions' => ['class' => 'text-center'],
        'headerOptions' => ['class' => 'text-center']
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id_sub_indikator'=>$model->id_sub_indikator,'tahun'=>$model->tahun]);
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