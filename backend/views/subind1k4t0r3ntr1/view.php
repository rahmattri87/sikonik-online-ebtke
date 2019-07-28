<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subind1k4t0r3ntr1 */
?>
<div class="subind1k4t0r3ntr1-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_indikator',
            'id_sub_indikator',            
            'uraian_keberhasilan:ntext',
            'target',
            'tri_wulan',            
            'capaian',
            'uraian_keberhasilan_entri:ntext',
            'kendala',
            'timeline',
            'bobot_nilai',
            'tahun',
        ],
    ]) ?>

</div>
