<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Buku Dipesan';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="peminjaman-index">

    <h1 style="text-align: center;">Data Buku Yang Dipesan</h1>
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
            <th>Nama Pemesan</th>
            <th>Judul Buku</th>
            <th>Tanggal Pesan</th>
            <th>Status</th>
        </thead>
        <tbody>
        <?php foreach ($model as $qry) : ?>
            <tr>
                <td><?= $qry['kode_peminjaman']; ?></td>
                <td><?= $qry['username']; ?></td>
                <td><?= $qry['judul_buku']; ?></td>
                <td><?= $qry['tgl_pesan']; ?></td>
                <td><?= $qry['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>