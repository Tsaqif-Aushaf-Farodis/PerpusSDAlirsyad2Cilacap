<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Transaksi Pengembalian';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="peminjaman-index">

    <h1 style="text-align: center;">Transaksi Pengembalian</h1>
    <h2 style="text-align: center;">Perpustakaan SD Al-Irsyad 02 Cilacap</h2>
    <br>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
        <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <th>Kode Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Judul Buku</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
        </thead>
        <tbody>
        <?php foreach ($model as $qry) : ?>
            <tr>
                <td><?= $qry['kode_peminjaman']; ?></td>
                <td><?= $qry['username']; ?></td>
                <td><?= $qry['judul_buku']; ?></td>
                <td><?= $qry['tgl_kembali']; ?></td>
                <td><?= $qry['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>