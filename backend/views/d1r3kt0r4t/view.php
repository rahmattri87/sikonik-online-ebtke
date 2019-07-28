<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\D1r3kt0r4t */
?>
<div class="d1r3kt0r4t-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kd_direktorat',
            'nm_direktorat',
        ],
    ]) ?>

</div>
