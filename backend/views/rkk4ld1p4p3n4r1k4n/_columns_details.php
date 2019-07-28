<?php
use yii\helpers\Url;
use kartik\grid\GridView;
return [   
    
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],

    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_rkkal_entri',
    // ],    
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'kd_subdir',
    //     'vAlign'=>'middle',
    //     'group'=>true,  
    // ],
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'value'=>'thnanggarannew',
    //     'label'=>'Tahun Anggaran',        
    //     'vAlign'=>'middle',
    //     'group'=>true,  
    // ],   
    // [
    //     'class'=>'\kartik\grid\DataColumn',
    //     'attribute'=>'id_rkkal',
    //     'vAlign'=>'middle',
    //     'group'=>true,  
    // ], 
    [
        'class'=>'\kartik\grid\DataColumn',
        'value'=>'kegiatan',
        'label'=>'Kegiatan',
        'vAlign'=>'middle',
        'format'=>'html',   
        'contentOptions' => [
            'style'=>'max-width:1000px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'value'=>'peserta',
        'label'=>'Peserta',
        'vAlign'=>'middle',
        'format'=>'html',   
        'contentOptions' => [
            'style'=>'max-width:1000px; overflow: auto; white-space: normal; word-wrap: break-word;'
        ],
    ],
        
    [
        'class'=>'\kartik\grid\DataColumn',
        'value'=>'lokasi',
        'label'=>'Lokasi',
        'vAlign'=>'middle',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'value'=>'tanggal',
        'label'=>'Tanggal',
        'vAlign'=>'middle',        
        'pageSummary'=>'Total Biaya Kegiatan :',
        'pageSummaryOptions'=>['class'=>'text-right text-warning'],
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'value'=>'tri_wulan',
        'label'=>'Tri wulan',
        'vAlign'=>'middle',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'value'=>'biaya',        
        'label'=>'biaya', 
        'format'=>['decimal',0],  
        'vAlign'=>'middle',  
        'hAlign'=>'right',        
        'pageSummary'=>true,
        'pageSummaryFunc'=>GridView::F_SUM      
    ],
     

];   