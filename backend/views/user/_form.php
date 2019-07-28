<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\D1r3kt0r4t; 
use backend\models\Subd1r3kt0r4t; 
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <!-- $form->field($model, 'auth_key')->textInput(['maxlength' => true]) -->

    <!-- $form->field($model, 'password_hash')->textInput(['maxlength' => true]) -->

    <!-- $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) -->

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php 
        $direktorat = ArrayHelper::map(D1r3kt0r4t::find()->orderBy('kd_direktorat')->all(), 'kd_direktorat', 
        function($model) {
            return $model['kd_direktorat'].' - '.$model['nm_direktorat'];
        }) 
    ?>                                    
    <?= 
            $form->field($model, 'kd_direktorat')->dropDownList($direktorat, 
            ['class' => 'form-control', 'id' => 'cbDirektorat3',
                'prompt'=>'Pilih Direktorat',
                'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('subd1r3kt0r4t/getsubdir?id=').'"+$(this).val(), function( data ) {
                $( "select#cbSbDirektorat3" ).html( data );
                });'
            ])            
    ?>

    <?php 
        $subdirektorat = ArrayHelper::map(Subd1r3kt0r4t::find()->all(), 'kd_subdir', 
        function($model) {
            return $model['kd_subdir'].' - '.$model['nm_subdir'];
        })
    ?>                                                                    
    <?= 
        $form->field($model, 'kd_subdir')->dropDownList($subdirektorat,
            ['class' => 'form-control', 'id' => 'cbSbDirektorat3'],['prompt'=>'Pilih Direktorat']) 
    ?>

    <!-- $form->field($model, 'status')->textInput() -->

    <!-- $form->field($model, 'created_at')->textInput() -->

    <!-- $form->field($model, 'updated_at')->textInput() -->

    <?= $form->field($model, 'role')->dropDownList([ 'user' => 'User', 'admin' => 'Admin', 'godmode' => 'Godmode', ], ['prompt' => '']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
