<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Subd1r3kt0r4t; 
use backend\models\Rkk4ld1p4r34l1s4s1; 
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Rkk4ld1p4r34l1s4s13ntr1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rkk4ld1p4r34l1s4s13ntr1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $data1=ArrayHelper::map(Subd1r3kt0r4t::find()->asArray()->all(), 'kd_subdir', 
        function($model) {
            return $model['kd_subdir'].' - '.$model['nm_subdir'];
        });
        echo $form->field($model, 'kd_subdir')->dropDownList($data1,
             ['prompt'=>'Pilih Sub Direktorat',
                'onchange'=>'
                    $.post( "'.Yii::$app->urlManager->createUrl('rkk4ld1p4r34l1s4s13ntr1/getsubdir?id=').'"+$(this).val(), function( data ) {
                    $( "select#subdirektorat" ).html( data );
                });'
             ]);

        $data2=ArrayHelper::map(Rkk4ld1p4r34l1s4s1::find()->asArray()->all(), 'thn_anggaran', 'subdirektorat');
        echo $form->field($model, 'thn_anggaran')
           ->dropDownList(  
                $data2,
                ['id'=>'subdirektorat','prompt'=>'Pilih Tahun Anggaran',
                    'onchange'=>'
                        $.post( "'.Yii::$app->urlManager->createUrl('rkk4ld1p4r34l1s4s13ntr1/getthnanggaran?id=').'"+$(this).val(), function( data ) {
                        $( "select#idrkkal" ).html( data );
                    });'
                ]
           );  
           
           $data3=ArrayHelper::map(Rkk4ld1p4r34l1s4s1::find()->asArray()->all(), 'id_rkkal', 'idrkkal');
           echo $form->field($model, 'id_rkkal')
              ->dropDownList(  
                   $data3,
                   ['id'=>'idrkkal','prompt'=>'Pilih Dana yang dipakai',
                       'onchange'=>'
                           $.post( "'.Yii::$app->urlManager->createUrl('rkk4ld1p4r34l1s4s13ntr1/getidRkkal?id=').'"+$(this).val(), function( data ) {
                            $( "#idtarget" ).html( data );
                       });'
                   ]
              );  
    ?>    
        

    <?= $form->field($model, 'kegiatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'peserta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>
    
    <label class="control-label" for="rkk4ld1p4r34l1s4s13ntr1-tanggal">Tanggal</label>
    <?php 
        echo DateRangePicker::widget([
            'model'=>$model,
            'attribute'=>'tanggal',
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
    
    <?=
        $form->field($model, 'tri_wulan')->dropDownList(['I'=>'I - Satu','II'=>'II - Dua','III'=>'III - Tiga','IV'=>'IV - Empat'], 
        ['class' => 'form-control','id' => 'tri_wulan','prompt'=>'Triwulan']);     
    ?>

    <?= $form->field($model, 'biaya')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
