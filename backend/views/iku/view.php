<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Iku */
?>
<div class="iku-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_iku',
            'kd_subdir',
            'nm_dokumen',
            'upload_src_filename',
            'upload_web_filename',
            'id_user',
            'wkt_input',
            'ip_input',
        ],
    ]) ?>

</div>
