<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\helpers\ArrayHelper;
use backend\models\Subd1r3kt0r4t; 
use yii\widgets\Pjax;

$this->title = 'upload rkkal';
$this->params['breadcrumbs'][] = 'upload rkkal';
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>

<div class="row" id="isidata">        
    <div class="col-md-12">          
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
              <li><a href="#tab_1-1" data-toggle="tab">RKKAL Revisi</a></li>
              <li><a href="#tab_2-2" data-toggle="tab">RKKAL Awal</a></li>
              <li class="active"><a href="#tab_3-2" data-toggle="tab">Upload Excel</a></li>
              
              <li class="pull-left header"><i class="fa fa-th"></i> Data RKKAL</li>
            </ul>
            <div class="tab-content">
              <!-- tab rkkal revisi -->
              <div class="tab-pane" id="tab_1-1">
                <?php Pjax::begin(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                            </div>
                                                                           
                            <div class="box-body">
                                <?php $str = explode(',',$string) ?>
                                <?= Html::beginForm(['/rkk4ld1p4'], 'post', ['data-pjax' => '', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form']); ?>                                        
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Direktorat</label>

                                            <div class="col-sm-8">
                                                <?= Html::dropDownList('cbSbDirektorat2', $str[0],
                                                ArrayHelper::map(Subd1r3kt0r4t::find()->all(), 'kd_subdir', 
                                                function($model) {
                                                    return $model['kd_subdir'].' - '.$model['nm_subdir'];
                                                }),['class' => 'form-control', 'id' => 'cbSbDirektorat2', 'value'=>'' ],['prompt'=>'Pilih Direktorat']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Tahun anggaran</label>

                                            <div class="col-sm-5">
                                                <?= Html::dropDownList('thn2', $str[1],
                                                ['2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',
                                                '2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'],
                                                ['class' => 'form-control', 'id' => 'thn2', 'value'=>''],['prompt'=>'Pilih tahun']) ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Revisi ke -</label>

                                            <div class="col-sm-5">
                                                <?= Html::dropDownList('cbRevisi2', $str[2],
                                                ['0'=>'0','1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5','6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10',
                                                    '11'=>'11', '12'=>'12', '13'=>'13', '14'=>'14', '15'=>'15'],
                                                ['class' => 'form-control', 'id' => 'cbRevisi2', 'value'=>'2'],['prompt'=>'Pilih Direktorat']) ?>
                                            </div>
                                        </div>
                                        
                                    <div class="box-footer">  
                                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'Submit']) ?>
                                    </div>
                                <?= Html::endForm() ?>                                
                            </div>   

                            
                        </div>
                    </div>
                </div>
                
                <section class="content">
                    <div class="row">         
                        <?php
                        CrudAsset::register($this);
                        ?>
                        <div class="d1r3kt0r4t-index">
                            <div id="ajaxCrudDatatable">
                                <?=GridView::widget([
                                    'id'=>'crud-datatable',                  
                                    'showPageSummary'=>true,        
                                    'hover'=>true,                
                                    'dataProvider' => $dataProvider3,
                                    'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
                                    'filterModel' => '',
                                    'pjax'=>true,                    
                                    'columns' => require(__DIR__.'/_columns.php'),                    
                                    'toolbar'=> [ 
                                    ['content'=> 
                                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                    ['data-pjax'=>3, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).               
                                    '{toggleData}'.
                                    '{export}'
                                    ],                       
                                    ],          
                                     'striped' => true,
                                     'condensed' => true,
                                     'responsive' => true,          
                                     'panel' => [
                                     'type' => 'primary', 
                                     'heading' => '',
                                     'before'=>'<em></em>',
                                     'after'=>BulkButtonWidget::widget([                                    
                                    ]),
                                    ]
                                ])?>
                            </div>
                        </div>        
                    </div>
                </section>

                <?php Pjax::end(); ?> 
              </div>

              <!-- tab rkkal awal -->
              <div class="tab-pane" id="tab_2-2">
                <section class="content">
                <div class="row">         
                        <?php
                        CrudAsset::register($this);
                        ?>
                        <div class="d1r3kt0r4t-index">
                            <div id="ajaxCrudDatatable">
                                <?=GridView::widget([
                                    'id'=>'crud-datatable',                  
                                    'showPageSummary'=>true,        
                                    'hover'=>true,                
                                    'dataProvider' => $dataProvider2,
                                    'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
                                    'filterModel' => '',
                                    'pjax'=>true,                    
                                    'columns' => require(__DIR__.'/_columns.php'),                     
                                    'toolbar'=> [ 
                                        ['content'=>
                                        Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                        ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                                        '{toggleData}'.
                                        '{export}'
                                        ],                       
                                    ],          
                                    'striped' => true,
                                    'condensed' => true,
                                    'responsive' => true,          
                                    'panel' => [
                                        'type' => 'primary', 
                                        'heading' => '',
                                        'before'=>'<em></em>',
                                        'after'=>BulkButtonWidget::widget([                                    
                                                ]),
                                    ]
                                ])?>
                            </div>
                        </div>        
                </div>
                </section>

              </div>
            
              <!-- tab upload excel -->
              <div class="tab-pane active" id="tab_3-2"> 
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>                                
                            </div>
                            </div>
                            <div class="box-body">                                                    
                                <form method="POST" class="myForm" enctype="multipart/form-data" role="form">
                                    <div class="box-body">                                                                                    
                                        <h4>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="r1" onchange="get_radio();" checked>
                                                Upload awal
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="r2" onchange="get_radio();">
                                                Upload revisi
                                            </label>
                                        </div></h4><br>

                                        <label for="exampleInputEmail1">Direktorat</label>
                                        <?= Html::dropDownList('cbSbDirektorat', null,
                                            ArrayHelper::map(Subd1r3kt0r4t::find()->all(), 'kd_subdir', 
                                            function($model) {
                                                return $model['kd_subdir'].' - '.$model['nm_subdir'];
                                            }),['class' => 'form-control'],['prompt'=>'Pilih Direktorat']) ?><br>
                                    
                                        <!-- <input type="text" id="thn" name="thn" class="form-control"  placeholder="Tahun Anggaran RKKAL" required onkeypress='return event.charCode >= 48 && event.charCode <= 57'></input>                                         -->
                                        <label for="exampleInputEmail1">Tahun anggaran</label>
                                        <?= Html::dropDownList('thn', null,
                                            ['2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',
                                            '2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'],
                                            ['class' => 'form-control'],['prompt'=>'Pilih tahun']) ?><br>

                                        <label for="exampleInputEmail1">File</label>                  
                                        <input type="file" id="fileInput" name="fileInput" class="form-control" required>   
                                        <p class="help-block"><i>Upload File Excel (.xls|.xlsx) | csv (.csv)</i></p>

                                         
                                        <!-- <label for="exampleInputEmail1">Revisi ke -</label> -->
                                        <?= Html::dropDownList('cbRevisi', null,
                                            ['0'=>'0','1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5','6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10',
                                                '11'=>'11', '12'=>'12', '13'=>'13', '14'=>'14', '15'=>'15'],
                                            ['class' => 'form-control', 'id' => 'cbRevisi', 'value'=>'0','style'=>'display:none'],['prompt'=>'Pilih Direktorat']) ?>
                                    </div>                                    

                                    <div class="box-footer">                
                                        <button onclick="btnProses()" class="btn btn-primary">Submit</button>
                                    </div>                                    

                                </form>                        
                            </div>
                        </div>
                    </div>
                </div>
                                
                <?php if($dataProvider->getTotalCount()!=0){ ?> 
                    <button onclick="btnTransferExcel()" class="btn btn-success">Save Data</button>
                    <button onclick="btnTruncateExcel()" class="btn btn-danger">Clear Proses</button>
                    <section class="content">
                                <div class="row">         
                                    <?php
                                    CrudAsset::register($this);
                                    ?>
                                    <div class="d1r3kt0r4t-index">
                                        <div id="ajaxCrudDatatable">
                                            <?=GridView::widget([
                                                'id'=>'crud-datatable',                  
                                                'showPageSummary'=>true,        
                                                'hover'=>true,                
                                                'dataProvider' => $dataProvider3,
                                                'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
                                                'filterModel' => '',
                                                'pjax'=>true,                    
                                                'columns' => require(__DIR__.'/_columns.php'),                     
                                                'toolbar'=> [ 
                                                    ['content'=>
                                                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                                                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                                                    '{toggleData}'.
                                                    '{export}'
                                                    ],                       
                                                ],          
                                                'striped' => true,
                                                'condensed' => true,
                                                'responsive' => true,          
                                                'panel' => [
                                                    'type' => 'primary', 
                                                    'heading' => '',
                                                    'before'=>'<em></em>',
                                                    'after'=>BulkButtonWidget::widget([                                    
                                                            ]),
                                                ]
                                            ])?>
                                        </div>
                                    </div>        
                                </div>
                    </section>
                <?php } ?> 
              </div>

            </div>            
        </div>
    </div>
</div>

<!-- ---------------------------------------------------------------------------------------------------- -->
<script type="text/javascript">	
	
	function btnProses(){	
        var formData = new FormData($('.myForm')[0]);
		var thn=$('[name=thn]').val();
        var fileInput=$('[name=fileInput]').val();
        var cbSbDirektorat=$('[name=cbSbDirektorat]').val();
        var opt=$('[name=optionsRadios]:checked').val();

        var formUrl="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4/import-excel' ?>";		

        if(thn==''||fileInput==''){
            alert("Input data tidak valid.");              
        }else{
            $.ajax({
                url: formUrl,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){				
                    
                }, 
                success: function(html,data, textSatus, jqXHR){                                                                
                    window.location.href="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4' ?>";                       
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert("Error");           
                    window.location.href="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4' ?>";                                                      
                }
            });	            
        }        		
	}

    function btnProsesRevisi(){	
        var formData = new FormData($('.myFormRevisi')[0]);
		var thn=$('[name=thn2]').val();        
        var cbSbDirektorat=$('[name=cbSbDirektorat2]').val();        
        var cbRevisi=$('[name=cbRevisi2]').val(); 

        //http://localhost/advanced/4dm1n/rkk4ld1p4/index-revisi?kd_subdir=DKP&thn=2017&revisi=15
        var formUrl="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4/index-revisi' ?>";		      
        
        $.ajax({
                url: formUrl,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false
			});      		
	}

    function btnTransferExcel(){	
        var formData = '';		
        var formUrl="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4/transfer-excel' ?>";		        
        $.ajax({
                url: formUrl,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){				
                    
                }, 
                success: function(html,data, textSatus, jqXHR){                                                                
                    //alert("Ok");                     
                    window.location.href="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4' ?>";                       
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert("Error");
                    //window.location.href="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4' ?>";                       
                }
        });	    		
    }
    
    function btnTruncateExcel(){	
        var formData = '';		
        var formUrl="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4/truncate-excel' ?>";		        
        $.ajax({
                url: formUrl,
                type: 'POST',
                data: formData,
                mimeType: "multipart/form-data",
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function(){				
                    $("#isidata").html('<div style="width:500px; margin:0 auto;"><img src="<?= $directoryAsset ?>/img/xloading-x.gif"></div>');												
                }, 
                success: function(html,data, textSatus, jqXHR){                                                                
                    //alert("Ok"); 
                    window.location.href="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4' ?>";                       
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert("Error");
                    //window.location.href="<?php echo Yii::$app->request->baseUrl.'/rkk4ld1p4' ?>";                       
                }
        });	    		
	}

    function get_radio(){    
        var opt=$('[name=optionsRadios]:checked').val();
        if(opt == 'r1')
        {
            //$('#cbRevisi').attr('hidden', true);
            $("#cbRevisi").hide();
            $('[name=cbRevisi]').val("0");
        }
        else
        {
            //$('#cbRevisi').attr('hidden', false);
            $("#cbRevisi").show();
            $('[name=cbRevisi]').val("1");
        }    
    }

</script>