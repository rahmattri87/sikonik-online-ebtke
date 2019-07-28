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
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_renstra',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'prd_renstra',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'kd_subdir',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'isi_renstra',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'cover_src_filename',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'cover_web_filename',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'file_src_filename',
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'file_web_filename',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'id_user',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'wkt_input',
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'ip_input',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'Image',
        'format' => 'raw',
        'value' => function ($model) {   
           if ($model->cover_web_filename!='')
             return '<img src="'.Yii::$app->getUrlManager()->getBaseUrl(). '/uploads/cover/'.$model->cover_web_filename.'" width="50px" height="auto">'; else return 'no image';
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute' => 'Pdf',
        'format' => 'raw',
        'value' => function ($model) {   
           if ($model->file_web_filename!='')                
           return '<a href="http://'.Yii::$app->getUrlManager()->getBaseUrl(). '/uploads/pdf/'.$model->file_web_filename.'" class="icon-block" target="_blank">pdf</a>'; else return 'no file';
        },
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