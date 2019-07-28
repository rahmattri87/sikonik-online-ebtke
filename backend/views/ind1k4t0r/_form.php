<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Subd1r3kt0r4t; 

/* @var $this yii\web\View */
/* @var $model backend\models\Ind1k4t0r */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ind1k4t0r-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_indikator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prd_indikator')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'kd_subdir')->dropDownList(
                ArrayHelper::map(Subd1r3kt0r4t::find()->all(),'kd_subdir', 
                function($model) {
                    return $model['kd_subdir'].' - '.$model['nm_subdir'];
                }
            ),
                ['prompt'=>'Pilih Direktorat']
        )
        ?>

    <?= $form->field($model, 'isi_indikator')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'kriteria_keberhasilan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bobot_capaian')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'id_user')->hiddenInput(['maxlength' => true,'value' => Yii::$app->user->identity->alias,'disabled' => false])->label(false) ?>

    <?=         
        $form->field($model, 'wkt_input')->hiddenInput(['maxlength' => true,'value' => date('Y-m-d H:i:s'),'disabled' => false])->label(false) 
    ?>

    <?php
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }  
    ?>
        
    <?= $form->field($model, 'ip_input')->hiddenInput(['maxlength' => true,'value' => $ip,'disabled' => false])->label(false) ?>
  

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
