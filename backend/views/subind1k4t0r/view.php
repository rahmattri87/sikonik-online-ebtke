<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subind1k4t0r */
?>
<div class="subind1k4t0r-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_sub_indikator',
            'id_indikator',
            'uraian_keberhasilan:ntext',
            'target',
        ],
    ]) ?>

</div>
