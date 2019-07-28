<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subd1r3kt0r4t */
?>
<div class="subd1r3kt0r4t-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kd_subdir',
            'nm_subdir',
            'kd_direktorat',
        ],
    ]) ?>

</div>
