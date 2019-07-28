<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\Rkk4ld1p4p3n4r1k4nSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'RKKAL Dipa Realisasi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="col-xs-12">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Rencana Penarikan dan Realisasi RKKAL</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                    </div>
                </div>
        </div>
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
            <tr>
                <th>Kode Direktorat</th>
                <th>Nama</th>
                <th>Tahun Anggaran</th>
                <th>Revisi</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
            <?php foreach($model as $field){ ?>
            <tr>
                <td><?= $field['kd_subdir']; ?></td>
                <td><?= $field['nm_subdir']; ?></td>
                <td><?= $field['thn_anggaran']; ?></td>
                <td><?= $field['revisi']; ?></td>
                <td><?= $field['jml']; ?></td>                
                <td>
                    <?= Html::a('<span class="btn btn-block btn-warning">Update Realisasi</span>', 
                    ['rkk4ld1p4p3n4r1k4n/proses-realisasi', 'kd_subdir' => $field['kd_subdir'], 
                    'thn_anggaran' => $field['thn_anggaran'], 'revisi' => $field['revisi']]); ?>                     
                </td>
            </tr>
            <?php } ?>
            </table>
        </div>        
    </div>          
</div>
