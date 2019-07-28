<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Rkk4ld1p4r34l1s4s13ntr1 */
?>
<div class="rkk4ld1p4r34l1s4s13ntr1-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_rkkal_entri',
            'id_rkkal',
            'kd_subdir',
            'thn_anggaran',
            'kegiatan:ntext',
            'peserta:ntext',
            'lokasi',
            'tanggal',
            'tri_wulan',
            'biaya',
        ],
    ]) ?>

</div>
