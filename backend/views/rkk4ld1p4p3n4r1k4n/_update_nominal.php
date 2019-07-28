<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
    <?php $form = ActiveForm::begin([ 'enableClientValidation' => true,
                'options'                => [
                    'id'      => 'dynamic-form'
                 ]]);
                ?>

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Anggaran Penarikan</h4>
      </div>
      <div class="modal-body">
            <?php echo $form->field($model, 'n01')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n02')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n03')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n04')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n05')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n06')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n07')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n08')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n09')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n10')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n11')->textInput(['maxlength' => true]) ?>
            <?php echo $form->field($model, 'n12')->textInput(['maxlength' => true]) ?>
      </div>
      <div class="modal-footer">
       <?php echo Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-success']) ?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <?php ActiveForm::end(); ?>