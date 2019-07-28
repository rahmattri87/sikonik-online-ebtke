<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\D1r3kt0r4t */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="d1r3kt0r4t-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kd_direktorat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_direktorat')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
