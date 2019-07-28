<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\R3nstr4 */
?>
<div class="r3nstr4-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_renstra',
            'prd_renstra',
            'kd_subdir',
            'isi_renstra:ntext',
            'cover_src_filename',
            'cover_web_filename',
            'file_src_filename',
            'file_web_filename',
            'id_user',
            'wkt_input',
            'ip_input',
        ],
    ]) ?>

    <?php
       if ($model->cover_web_filename!='') {
         echo '<br /><p><img src="'.Yii::$app->homeUrl. '/uploads/cover/'.$model->cover_web_filename.'"></p>';
       }    
    ?>
</div>
