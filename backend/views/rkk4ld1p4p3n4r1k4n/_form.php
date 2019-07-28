<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Rkk4ld1p4p3n4r1k4n */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rkk4ld1p4p3n4r1k4n-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_rkkal')->textInput() ?>

    <?= $form->field($model, 'kd_apbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kd_subdir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thn_anggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uraian_kegiatan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anggaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '01')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '02')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '03')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '04')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '05')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '06')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '07')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '08')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '09')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, '12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wkt_input')->textInput() ?>

    <?= $form->field($model, 'ip_input')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'revisi')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
