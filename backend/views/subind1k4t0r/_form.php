<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Ind1k4t0r; 

/* @var $this yii\web\View */
/* @var $model backend\models\Subind1k4t0r */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subind1k4t0r-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sub_indikator')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'id_indikator')->dropDownList(
                ArrayHelper::map(Ind1k4t0r::find()->all(),'id_indikator', 
                function($model) {
                    return $model['id_indikator'].' - '.$model['isi_indikator'];
                }
            ),
                ['prompt'=>'Pilih Indikator']
        )
    ?>

    <?= $form->field($model, 'uraian_keberhasilan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'target')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
