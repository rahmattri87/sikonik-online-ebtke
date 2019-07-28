<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\D1r3kt0r4t; 

/* @var $this yii\web\View */
/* @var $model backend\models\Subd1r3kt0r4t */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subd1r3kt0r4t-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
        $form->field($model, 'kd_direktorat')->dropDownList(
                ArrayHelper::map(D1r3kt0r4t::find()->all(),'kd_direktorat', 
                function($model) {
                    return $model['kd_direktorat'].' - '.$model['nm_direktorat'];
                }
            ),
                ['prompt'=>'Pilih Direktorat']
        )
    ?>

    <?= $form->field($model, 'kd_subdir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nm_subdir')->textInput(['maxlength' => true]) ?>
   
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>


<?php

$script = <<< JS


 var current_kd_direktorat = 0;
$("select").change(function() {
    current_kd_direktorat = $(this).val()    
    $(".nm_subdir").text("xxx");
    //alert(current_kd_direktorat);    
    //document.getElementById("nm_subdir").value = "My value";
    //var a = document.getElementById("nm_subdir");
    //a.value = "some value";
    // $.ajax({
    //     url: 'index.php?r=test/get-hobbies&employee_id='+current_employee_id,
    //     dataType: "json",
    //     success: function(data) {
    //       $.each(data, function(key, value){
    //         $('input[type=checkbox]').each(function () {
    //             if($(this).val()==key){
    //               $(this).prop('checked', true);
    //             }
    //         });
    //       });
    //     }
    // })
});
 
 
JS;
$this->registerJs($script);
