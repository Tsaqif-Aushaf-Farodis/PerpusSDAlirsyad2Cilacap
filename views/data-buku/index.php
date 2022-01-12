<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataBukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Data Buku Perpustakaan';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="data-buku-index">

    <h1 style="text-align: center;">Sistem Informasi Perpustakaan</h1>
    <h2 style="text-align: center;">SD Al-Irsyad 02 Cilacap</h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="text-align: center;">
        <?= Html::a('Create Data Buku', ['create'], ['class' => 'btn btn-success', 'style' => 'width: 100px;']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button', 'style' => 'width: 100px;']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        [
            'class' => 'yii\grid\SerialColumn',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:10px; text-align: center;'],
        ],
        // 'id_buku',
        [
            'attribute' => 'no_barcode',
            'label' => 'Nomor Barcode',
            'value' => 'no_barcode',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:100px;'],
        ],
        // 'tanggal_pengadaan',
        [
            'attribute' => 'judul_buku',
            'label' => 'Judul Buku',
            'value' => 'judul_buku',
            'headerOptions' => ['style' => 'text-align: center;'],
        ],
        // 'jenis_sumber',
        // 'kategori',
        [
            'attribute' => 'akses',
            'label' => 'Akses',
            'value' => 'akses',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:100px;'],
        ],
        [
            'attribute' => 'ketersediaan',
            'label' => 'Ketersediaan',
            'value' => 'ketersediaan',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:100px;'],
        ],
        [
            'attribute' => 'lokasi_perpustakaan',
            'label' => 'Lokasi Perpustakaan',
            'value' => 'lokasi_perpustakaan',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:150px;'],
        ],
        [
            'attribute' => 'lokasi_ruang',
            'label' => 'Lokasi Ruang',
            'value' => 'lokasi_ruang',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:150px;'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width:53px; text-align: center;'],
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-data-buku']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        // 'toolbar' => [
        //     '{export}',
        //     ExportMenu::widget([
        //         'dataProvider' => $dataProvider,
        //         'columns' => $gridColumn,
        //         'target' => ExportMenu::TARGET_BLANK,
        //         'fontAwesome' => true,
        //         'dropdownOptions' => [
        //             'label' => 'Full',
        //             'class' => 'btn btn-default',
        //             'itemsBefore' => [
        //                 '<li class="dropdown-header">Export All Data</li>',
        //             ],
        //         ],
        //         'exportConfig' => [
        //             ExportMenu::FORMAT_PDF => false
        //         ]
        //     ]) ,
        // ],
    ]); ?>

</div>
