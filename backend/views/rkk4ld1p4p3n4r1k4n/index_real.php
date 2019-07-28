<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Rkk4ld1p4p3n4r1k4nSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'RKKAL Dipa Realisasi';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Proses Realisasi RKKAL</h3>
            </div>    

            <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Direktorat</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" value=<?php echo $nparams['kd_subdir']; ?> disabled>
                    </div>                
            </div>                
            </div>     
            
            <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tahun Anggaran</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" value=<?php echo $nparams['thn_anggaran']; ?> disabled>
                    </div>                
            </div>                
            </div>     
            
            <div class="box-body">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Revisi</label>
                    <div class="col-sm-10">
                        <input type="input" class="form-control" value=<?php echo $nparams['revisi']; ?> disabled>
                    </div>                
            </div>                
            </div>     
            
            <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Finish and Process</button>
                </div>

        </div>
    </div>  
</div>  
          
              

<?php

CrudAsset::register($this);

?>
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
                'dataProvider' => $dataProvider,
                'layout' => "{summary}\n{items}\n<div align='center'>{pager}</div>",
                'filterModel' => '',
                'pjax'=>true,                    
                'columns' => require(__DIR__.'/_columns.php'),                    
                'toolbar'=> [ 
                    ['content'=> 
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

<div class="modal remote fade" id="modalvote">
        <div class="modal-dialog">
            <div class="modal-content loader-lg"></div>
        </div>
</div>
