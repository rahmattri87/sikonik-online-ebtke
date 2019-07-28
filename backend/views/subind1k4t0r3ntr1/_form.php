<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Ind1k4t0r; 
use backend\models\Subind1k4t0r; 
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Subind1k4t0r3ntr1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subind1k4t0r3ntr1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $dataIndikator=ArrayHelper::map(Ind1k4t0r::find()->asArray()->all(), 'id_indikator', 
        function($model) {
            return $model['id_indikator'].' - '.$model['isi_indikator'];
        });
        echo $form->field($model, 'id_indikator')->dropDownList($dataIndikator,
             ['prompt'=>'Pilih Sub Indikator',
                'onchange'=>'
                    $.post( "'.Yii::$app->urlManager->createUrl('subind1k4t0r3ntr1/lists?id=').'"+$(this).val(), function( data ) {
                    $( "select#subindikator" ).html( data );
                });'
             ]);

        $dataSubIndikator=ArrayHelper::map(Subind1k4t0r::find()->asArray()->all(), 'id_sub_indikator', 'subindikator');
        echo $form->field($model, 'id_sub_indikator')
           ->dropDownList(  
                $dataSubIndikator,
                ['id'=>'subindikator','prompt'=>'Pilih Sub Indikator',
                    'onchange'=>'
                        $.post( "'.Yii::$app->urlManager->createUrl('subind1k4t0r3ntr1/gettarget?id=').'"+$(this).val(), function( data ) {
                        $( "#idtarget" ).html( data );
                    });'
                ]
           );        
    ?>

    <div id="idtarget">
    <div class='form-group field-idtarget'>
        <label class='control-label' for='idtarget'>Target Indikator Keberhasilan</label>
            <input type='text' id='idtarget' class='form-control' name='idtarget' value='0' disabled=''>
        <div class='help-block'></div>
    </div>
    </div>

    <?=
        $form->field($model, 'tri_wulan')->dropDownList(['I'=>'I - Satu','II'=>'II - Dua','III'=>'III - Tiga','IV'=>'IV - Empat'], 
        ['class' => 'form-control','id' => 'tri_wulan','prompt'=>'Triwulan']);     
    ?>

    <?= $form->field($model, 'capaian')->textInput() ?>

    <?= $form->field($model, 'uraian_keberhasilan_entri')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kendala')->textarea(['rows' => 6]) ?>

    <label class="control-label" for="subind1k4t0r3ntr1-capaian">Timeline</label>
    <?php 
        echo DateRangePicker::widget([
            'model'=>$model,
            'attribute'=>'timeline',
            'convertFormat'=>true,
            'pluginOptions'=>[
                'timePicker'=>false,
                'timePickerIncrement'=>30,
                'locale'=>[
                    'format'=>'Y-m-d'
                ]
            ]
        ]);
    ?><br>

    <?= $form->field($model, 'bobot_nilai')->textInput() ?>

    
    <?=
        $form->field($model, 'tahun')->dropDownList(
        ['2010'=>'2010','2011'=>'2011','2012'=>'2012','2013'=>'2013','2014'=>'2014','2015'=>'2015',
         '2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020'],
        ['class' => 'form-control','id' => 'tahun','prompt'=>'Tahun']);     
    ?>
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
