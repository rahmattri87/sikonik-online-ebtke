<?php
//print_r($searchModel);
?>
<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

?>
<div class="row">
<section class="content">
<div class="row">  

    <div class="col-md-1">
    </div>
    <div class="col-md-11">   
        <?php
        CrudAsset::register($this);
        ?>
        <div id="ajaxCrudDatatable">
            <?=GridView::widget([
                'id'=>'crud-datatable',
                'showPageSummary'=>true,  
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'pjax'=>true,
                'columns' => require(__DIR__.'/_columns_details.php'),
                'toolbar'=> [],          
                'striped' => true,
                'condensed' => true,
                'responsive' => true,          
                'panel' => [
                    'type' => GridView::TYPE_WARNING,
                    'heading' => '',
                    'before'=>'',
                    'after'=>'',
                ]
            ])?>
        </div>     
    </div>
          
</div>
</section>
</div>

