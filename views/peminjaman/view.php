<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = $model->kode_peminjaman;
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Peminjaman'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->kode_peminjaman], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->kode_peminjaman], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'kode_peminjaman',
        [
            'attribute' => 'user.username',
            'label' => 'Nama Peminjam',
        ],
        [
            'attribute' => 'buku.judul_buku',
            'label' => 'Judul Buku',
        ],
        'tgl_pesan',
        'tgl_pinjam',
        'tgl_kembali',
        'jadwal_tgl_kembali',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
