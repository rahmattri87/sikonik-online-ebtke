<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ind1k4t0r */
?>
<div class="ind1k4t0r-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_indikator',
            'prd_indikator',
            'kd_subdir',
            'isi_indikator:ntext',
            'kriteria_keberhasilan',
            'bobot_capaian',
            'id_user',
            'wkt_input',
            'ip_input',
        ],
    ]) ?>

</div>
