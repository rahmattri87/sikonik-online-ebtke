<?php
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\Highstock;
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\helpers\ArrayHelper;
use backend\models\Subd1r3kt0r4t; 
use backend\models\Ind1k4t0r; 
use yii\widgets\Pjax;

use backend\models\D1r3kt0r4t; 

/* @var $this yii\web\View */

$this->title = 'Sikonik Online';
?>
<?php $str = explode(',',$string) ?>
<?php //print_r($chart_x_series);  ?>

<div class="row" id="isidata">        
    <div class="col-md-12">          
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">Indikator Kinerja</a></li>
              <li class="active"><a href="#tab_2-2" data-toggle="tab">Rencana Penarikan dan Realisasi</a></li>
              
              <li class="pull-left header"><i class="fa fa-th"></i> Dashboard v.1</li>
            </ul>
            <div class="tab-content">
              <!-- Indikator Kinerja -->
              <div class="tab-pane" id="tab_1-1">
                <section class="content">
                <div class="row">         
                    <div class="site-index">   
                        
                        <?php Pjax::begin(); ?>                    
                            <div class="row">  
                            <?= Html::beginForm(['/'], 'post', ['data-pjax' => '', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form']); ?>                                        
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Tahun</label>
                                    <div class="col-sm-1">
                                        <?= Html::dropDownList('thn5', $str[10],
                                            ['2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',
                                            '2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'],
                                            ['class' => 'form-control', 'id' => 'thn5'],['prompt'=>'Pilih tahun']) ?>                
                                    </div>
                                    <label class="col-sm-1 control-label">Direktorat</label>
                                    <div class="col-sm-2">
                                        <?php 
                                            $direktorat = ArrayHelper::map(D1r3kt0r4t::find()->orderBy('kd_direktorat')->all(), 'kd_direktorat', 
                                            function($model) {
                                                return $model['kd_direktorat'].' - '.$model['nm_direktorat'];
                                            }) 
                                        ?>
                                        <?= Html::dropDownList('cbDirektorat5', $str[11], $direktorat, 
                                            ['class' => 'form-control', 'id' => 'cbDirektorat5'],['prompt'=>'Pilih direktorat']) ?>                                        
                                    </div>
                                    <div class="col-sm-2">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Submit']) ?>
                                    </div>
                                </div>                            
                                <?= Html::endForm() ?>   


                                <div class="col-md-12">                
                                    <?php
                                    
                                    echo Highcharts::widget([
                                        'scripts' => [
                                            'modules/exporting',
                                            'themes/grid-light',
                                        ],
                                        'options' => [
                                            'chart'=>[
                                                //'renderTo'=>'chartContainer',
                                                'type'=>'column',
                                                //'width'=>'600',
                                            ],
                                            'title' => ['text' => "Indikator Bobot Capaian Direktorat ".$str[12]." Tahun ".$str[10]],
                                            'subtitle'=> ['text'=>'Source sikonik.online'],
                                            'xAxis' => [
                                                'categories' => $chart_x_axis4,
                                                'crosshair' => FALSE
                                            ],
                                            'labels' => [
                                                'items' => [
                                                    [
                                                        'html' => "Indikator Bobot Capaian Direktorat ".$str[12]." Tahun ".$str[10],
                                                        'style' => [
                                                            'left' => '160px',
                                                            'top' => '5px',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'series' => $chart_x_series5,
                                            /*---------*/
                                        ]
                                    ]);
                                    
                                    ?>
                                </div>                                

                            </div>
                        <?php Pjax::end(); ?> 
                        
                        <div class="row"> <br><br> </div>
                        
                        <?php Pjax::begin(); ?>                    
                            <div class="row">  
                            <?= Html::beginForm(['/'], 'post', ['data-pjax' => '', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form']); ?>                                        
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Tahun</label>
                                    <div class="col-sm-1">
                                        <?= Html::dropDownList('thn4', $str[5],
                                            ['2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',
                                            '2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'],
                                            ['class' => 'form-control', 'id' => 'thn4', 'value'=>''],['prompt'=>'Pilih tahun']) ?>                
                                    </div>
                                   
                                    <label class="col-sm-1 control-label">Direktorat</label>
                                    <div class="col-sm-2">
                                        <?php 
                                            $direktorat = ArrayHelper::map(D1r3kt0r4t::find()->orderBy('kd_direktorat')->all(), 'kd_direktorat', 
                                            function($model) {
                                                return $model['kd_direktorat'].' - '.$model['nm_direktorat'];
                                            }) 
                                        ?>                                    
                                        <?= 
                                            Html::dropDownList('cbDirektorat4', $str[6], $direktorat, 
                                            ['class' => 'form-control', 'id' => 'cbDirektorat4',
                                                'prompt'=>'Pilih Direktorat',
                                                'onchange'=>'
                                                    $.post( "'.Yii::$app->urlManager->createUrl('subd1r3kt0r4t/getsubdir?id=').'"+$(this).val(), function( data ) {
                                                    $( "select#cbSbDirektorat4" ).html( data );
                                                });'
                                            ]) 
                                        ?>                                    
                                    </div>
                                    <label for="inputEmail3" class="col-sm-1 control-label">ID Sub Direktorat</label>
                                    <div class="col-sm-2">                                    
                                        <?php 
                                            $subdirektorat = ArrayHelper::map(Subd1r3kt0r4t::find()->all(), 'kd_subdir', 
                                            function($model) {
                                                return $model['kd_subdir'].' - '.$model['nm_subdir'];
                                            })
                                        ?>                                                                    
                                        <?=                                            
                                            Html::dropDownList('cbSbDirektorat4', $str[7], $subdirektorat, 
                                            ['class' => 'form-control', 'id' => 'cbSbDirektorat4',
                                                'prompt'=>'Pilih ID Sub Direktorat',
                                                'onchange'=>'
                                                    $.post( "'.Yii::$app->urlManager->createUrl('ind1k4t0r/getindikator?id=').'"+$(this).val(), function( data ) {
                                                    $( "select#cbIdIndikator" ).html( data );
                                                });'
                                            ]) 
                                        ?>
                                    </div>                                    
                                    <div class="col-sm-2">                                    
                                        <?php 
                                            $cbIdIndikator = ArrayHelper::map(Ind1k4t0r::find()->all(), 'id_indikator', 
                                            function($model) {
                                                return $model['id_indikator'].' - '.$model['isi_indikator'];
                                            })
                                        ?>                                                                    
                                        <?= 
                                            Html::dropDownList('cbIdIndikator', $str[8],$cbIdIndikator,
                                            ['class' => 'form-control', 'id' => 'cbIdIndikator'],['prompt'=>'Pilih Direktorat']) 
                                        ?>
                                    </div>                                                                        
                                    
                                    <div class="col-sm-1">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Submit']) ?>
                                    </div>
                                </div>                                  

                                <?= Html::endForm() ?>     

                                <div class="col-md-6">                
                                    <?php
                                    echo Highcharts::widget([
                                        'scripts' => [
                                            'highcharts-more',   
                                            'modules/exporting', 
                                            'themes/grid' 
                                        ],
                                        'options' => [
                                            'chart'=>[
                                                //'renderTo'=>'chartContainer',
                                                'type'=>'column',
                                                //'width'=>'600',
                                            ],                        
                                            'title' => ['text' => "Indikator Bobot Capaian ".$str[9]." Tahun ".$str[5]],
                                            'subtitle'=> ['text'=>'Source sikonik.online'],
                                            'xAxis' => [
                                                'categories' => $chart_x_axis3,
                                                //'categories' => ['Jan', 'Feb', 'Mar', 'Apr'],
                                                'crosshair' => FALSE
                                            ],
                                            'yAxis' => [
                                                'title' => ['text' => NULL]
                                            ],
                                            'credits' => ['enabled' => FALSE],
                                            'dataLabels' => [ 'enabled' => TRUE,],
                                            'series' => $chart_x_series3,                         
                                        ]
                                    ]);                
                                    ?>
                                </div>
                                
                                <div class="col-md-6">                
                                    <?php
                                    echo Highcharts::widget([
                                        'scripts' => [
                                            'highcharts-more',   
                                            'modules/exporting', 
                                            'themes/grid' 
                                        ],
                                        'options' => [
                                            'chart'=>[
                                                //'renderTo'=>'chartContainer',
                                                'type'=>'column',
                                                //'width'=>'600',
                                            ],                        
                                            'title' => ['text' => "Indikator Capaian Prosentase % ".$str[9]." Tahun ".$str[5]],
                                            'subtitle'=> ['text'=>'Source sikonik.online'],
                                            'xAxis' => [
                                                'categories' => $chart_x_axis3,
                                                //'categories' => ['Jan', 'Feb', 'Mar', 'Apr'],
                                                'crosshair' => FALSE
                                            ],
                                            'yAxis' => [
                                                'title' => ['text' => NULL]
                                            ],
                                            'credits' => ['enabled' => FALSE],
                                            'dataLabels' => [ 'enabled' => TRUE,],
                                            'series' => $chart_x_series31,                         
                                        ]
                                    ]);                
                                    ?>
                                </div>

                            </div>
                        <?php Pjax::end(); ?> 

                    </div>
                </div>
                </section>
              </div>

              <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->                                            

              <!-- Rencana Penarikan dan Realisasi -->
              <div class="tab-pane active" id="tab_2-2">
                <section class="content">
                <div class="row">         
                    <div class="site-index">
                        <?php Pjax::begin(); ?>                    
                            <div class="row"> 
                                <?= Html::beginForm(['/'], 'post', ['data-pjax' => '', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form']); ?>                                        
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Tahun</label>
                                    <div class="col-sm-1">
                                        <?= Html::dropDownList('thn2', $str[0],
                                            ['2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',
                                            '2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'],
                                            ['class' => 'form-control', 'id' => 'thn2'],['prompt'=>'Pilih tahun']) ?>                
                                    </div>
                                    <label class="col-sm-1 control-label">Direktorat</label>
                                    <div class="col-sm-2">
                                        <?php 
                                            $direktorat = ArrayHelper::map(D1r3kt0r4t::find()->orderBy('kd_direktorat')->all(), 'kd_direktorat', 
                                            function($model) {
                                                return $model['kd_direktorat'].' - '.$model['nm_direktorat'];
                                            }) 
                                        ?>
                                        <?= Html::dropDownList('cbDirektorat2', $str[1], $direktorat, 
                                            ['class' => 'form-control', 'id' => 'cbDirektorat2'],['prompt'=>'Pilih direktorat']) ?>                                        
                                    </div>
                                    <div class="col-sm-2">
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Submit']) ?>
                                    </div>
                                </div>                            
                                <?= Html::endForm() ?>     

                                <div class="col-md-6">                
                                    <?php
                                    echo Highcharts::widget([
                                        'scripts' => [
                                            'highcharts-more',   
                                            'modules/exporting', 
                                            'themes/grid' 
                                        ],
                                        'options' => [
                                            'chart'=>[
                                                //'renderTo'=>'chartContainer',
                                                'type'=>'column',
                                                //'width'=>'600',
                                            ],                        
                                            'title' => ['text' => 'Rencana Penarikan dan Realisasi Anggaran Tahun '.$str[0]],
                                            'subtitle'=> ['text'=>'Source sikonik.online'],
                                            'xAxis' => [
                                                //'categories' => $chart_x_axis,
                                                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'],
                                                'crosshair' => FALSE
                                            ],
                                            'yAxis' => [
                                                'title' => ['text' => NULL]
                                            ],
                                            'credits' => ['enabled' => FALSE],
                                            'dataLabels' => [ 'enabled' => TRUE,],
                                            'series' => $chart_x_series,                         
                                        ]
                                    ]);                
                                    ?>
                                </div>

                                <div class="col-md-6">                
                                    <?php        
                                    echo Highcharts::widget([
                                        'scripts' => [
                                            'highcharts-more',   
                                            'modules/exporting', 
                                            'themes/grid' 
                                        ],
                                        'options' => [
                                            'chart'=>[                    
                                                //'width'=>'600',
                                            ],                        
                                            'title' => ['text' => 'Rencana Penarikan dan Realisasi Anggaran Tahun '.$str[0]],
                                            'subtitle'=> ['text'=>'Source sikonik.online'],
                                            'xAxis' => [
                                                //'categories' => $chart_x_axis,
                                                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'],
                                                'crosshair' => FALSE
                                            ],
                                            'yAxis' => [
                                                'title' => ['text' => NULL]
                                            ],
                                            'credits' => ['enabled' => FALSE],
                                            'dataLabels' => [ 'enabled' => TRUE,],
                                            'series' => $chart_x_series,                         
                                        ]
                                    ]);        
                                    ?>
                                </div>
                            </div>  

                            
                                                
                        <?php Pjax::end(); ?> 

                        <div class="row"> <br> </div>

                        <?php Pjax::begin(); ?>                    
                            <div class="row"> 
                            <?= Html::beginForm(['/'], 'post', ['data-pjax' => '', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form']); ?>                                        
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Tahun</label>
                                <div class="col-sm-1">
                                    <?= Html::dropDownList('thn3', $str[2],
                                        ['2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',
                                        '2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'],
                                        ['class' => 'form-control', 'id' => 'thn3'],['prompt'=>'Pilih tahun']) ?>                
                                </div>
                                <label class="col-sm-1 control-label">Direktorat</label>
                                <div class="col-sm-2">
                                    <?php 
                                        $direktorat = ArrayHelper::map(D1r3kt0r4t::find()->orderBy('kd_direktorat')->all(), 'kd_direktorat', 
                                        function($model) {
                                            return $model['kd_direktorat'].' - '.$model['nm_direktorat'];
                                        }) 
                                    ?>                                    
                                    <?= 
                                        Html::dropDownList('cbDirektorat3', $str[3], $direktorat, 
                                        ['class' => 'form-control', 'id' => 'cbDirektorat3',
                                            'prompt'=>'Pilih Direktorat',
                                            'onchange'=>'
                                                $.post( "'.Yii::$app->urlManager->createUrl('subd1r3kt0r4t/getsubdir?id=').'"+$(this).val(), function( data ) {
                                                $( "select#cbSbDirektorat3" ).html( data );
                                            });'
                                        ]) 
                                    ?>                                    
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Sub Direktorat</label>
                                <div class="col-sm-4">                                    
                                    <?php 
                                        $subdirektorat = ArrayHelper::map(Subd1r3kt0r4t::find()->all(), 'kd_subdir', 
                                        function($model) {
                                            return $model['kd_subdir'].' - '.$model['nm_subdir'];
                                        })
                                    ?>                                                                    
                                    <?= 
                                        Html::dropDownList('cbSbDirektorat3', $str[4],$subdirektorat,
                                        ['class' => 'form-control', 'id' => 'cbSbDirektorat3'],['prompt'=>'Pilih Direktorat']) 
                                    ?>
                                </div>

                                <div class="col-sm-2">
                                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Submit']) ?>
                                </div>
                            </div>
                            
                            <?= Html::endForm() ?>     
                                <div class="col-md-6">                
                                    <?php
                                    echo Highcharts::widget([
                                        'scripts' => [
                                            'highcharts-more',   
                                            'modules/exporting', 
                                            'themes/grid' 
                                        ],
                                        'options' => [
                                            'chart'=>[
                                                //'renderTo'=>'chartContainer',
                                                'type'=>'column',
                                                //'width'=>'600',
                                            ],                        
                                            'title' => ['text' => 'Rencana Penarikan dan Realisasi Anggaran '.$str[4].' Tahun '.$str[2]],
                                            'subtitle'=> ['text'=>'Source sikonik.online'],
                                            'xAxis' => [
                                                //'categories' => $chart_x_axis,
                                                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'],
                                                'crosshair' => FALSE
                                            ],
                                            'yAxis' => [
                                                'title' => ['text' => NULL]
                                            ],
                                            'credits' => ['enabled' => FALSE],
                                            'dataLabels' => [ 'enabled' => TRUE,],
                                            'series' => $chart_x_series2,                         
                                        ]
                                    ]);                
                                    ?>
                                </div>

                                <div class="col-md-6">                
                                    <?php        
                                    echo Highcharts::widget([
                                        'scripts' => [
                                            'highcharts-more',   
                                            'modules/exporting', 
                                            'themes/grid' 
                                        ],
                                        'options' => [
                                            'chart'=>[                    
                                                //'width'=>'600',
                                            ],                        
                                            'title' => ['text' => 'Rencana Penarikan dan Realisasi Anggaran '.$str[4].' Tahun '.$str[2]],
                                            'subtitle'=> ['text'=>'Source sikonik.online'],
                                            'xAxis' => [
                                                //'categories' => $chart_x_axis,
                                                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agus', 'Sep', 'Okt', 'Nov', 'Des'],
                                                'crosshair' => FALSE
                                            ],
                                            'yAxis' => [
                                                'title' => ['text' => NULL]
                                            ],
                                            'credits' => ['enabled' => FALSE],
                                            'dataLabels' => [ 'enabled' => TRUE,],
                                            'series' => $chart_x_series2,                         
                                        ]
                                    ]);        
                                    ?>
                                </div>
                            </div>                                        
                        <?php Pjax::end(); ?> 
                    </div>
                </div>
                </section>

              </div>
            
            </div>            
        </div>
    </div>
</div>
