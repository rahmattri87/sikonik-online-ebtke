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
        'label'=>'Id Indikator',
        'vAlign'=>'middle',
    ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'prd_indikator',
    //     'label'=>'Periode',
    //     'vAlign'=>'middle',
    // ],

    [
        'class'=>'\kartik\grid\EditableColumn',
        'attribute'=>'prd_indikator',
        'header'=>'Indikator',
        'label'=>'Indikator',
        'vAlign'=>'middle',
    ],

    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_subdir',
        'label'=>'Direktorat',
        'vAlign'=>'middle',
        'hAlign'=>'middle',
        
        'group'=>true,
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'isi_indikator',
        'label'=>'Indikator',
        'vAlign'=>'middle',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kriteria_keberhasilan',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'bobot_capaian',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id_user',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'wkt_input',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ip_input',
    // ],
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