<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\DataBuku */

$this->title = $model->judul_buku;
$this->params['breadcrumbs'][] = ['label' => 'Data Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-buku-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top:20px;">
            <?php if (User::hasRole(['admin', 'petugas'], $superAdminAllowed = true)) : ?>
                <?= Html::a('Update', ['update', 'id' => $model->id_buku], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id_buku], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            <?php endif; ?>
            <?php if (User::hasRole(['walisantri'], $superAdminAllowed = false)) : ?>
                <?= Html::a('Pinjam', ['peminjaman/create'], ['class' => 'btn btn-success']) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <?php
        $gridColumn = [
            'id_buku',
            'no_barcode',
            'tanggal_pengadaan',
            'judul_buku',
            'jenis_sumber',
            'kategori',
            'akses',
            'ketersediaan',
            'lokasi_perpustakaan',
            'lokasi_ruang',
        ];
        echo DetailView::widget([
            'model' => $model,
            'attributes' => $gridColumn
        ]);
        ?>
    </div>
</div>