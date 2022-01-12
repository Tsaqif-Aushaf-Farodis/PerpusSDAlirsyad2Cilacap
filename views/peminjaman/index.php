<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeminjamanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Peminjaman';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="peminjaman-index">

    <h1 style="text-align: center;">Sistem Informasi Perpustakaan</h1>
    <h2 style="text-align: center;">SD Al-Irsyad 02 Cilacap</h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <p style="text-align: center;">
        <!-- <?= Html::a('Create Peminjaman', ['create'], ['class' => 'btn btn-success', 'style' => 'width: 100px;']) ?> -->
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button', 'style' => 'width: 100px;']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php
    $gridColumn = [
        [
            'class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['style' => 'width:10px;'],
        ],
        // 'kode_peminjaman',
        [
            'attribute' => 'id',
            'label' => 'Nama Peminjam',
            'value' => function ($model) {
                return $model->user->username;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\webvimark\modules\UserManagement\models\User::find()->asArray()->all(), 'id', 'username'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid-peminjaman-search-id'],
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:100px;'],
        ],
        [
            'attribute' => 'id_buku',
            'label' => 'Judul Buku',
            'value' => function ($model) {
                return $model->buku->judul_buku;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \yii\helpers\ArrayHelper::map(\app\models\DataBuku::find()->asArray()->all(), 'id_buku', 'judul_buku'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Data buku', 'id' => 'grid-peminjaman-search-id_buku'],
            'headerOptions' => ['style' => 'text-align: center;'],
        ],
        [
            'attribute' => 'tgl_pesan',
            'label' => 'Tanggal Pesan',
            'value' => 'tgl_pesan',
            'headerOptions' => ['style' => 'width:130px; text-align: center;'],
            'contentOptions' => ['style' => 'width:130px; text-align: center;'],
        ],
        [
            'attribute' => 'tgl_pinjam',
            'label' => 'Tanggal Pengambilan',
            'value' => 'tgl_pinjam',
            'headerOptions' => ['style' => 'width:130px; text-align: center;'],
            'contentOptions' => ['style' => 'width:130px; text-align: center;'],
        ],
        [
            'attribute' => 'tgl_kembali',
            'label' => 'Tanggal Pengembalian',
            'value' => 'tgl_kembali',
            'headerOptions' => ['style' => 'width:130px; text-align: center;'],
            'contentOptions' => ['style' => 'width:130px; text-align: center;'],
        ],
        [
            'attribute' => 'jadwal_tgl_kembali',
            'label' => 'Batas Akhir Pengembalian',
            'value' => 'jadwal_tgl_kembali',
            'headerOptions' => ['style' => 'width:130px; text-align: center;'],
            'contentOptions' => ['style' => 'width:130px; text-align: center;'],
        ],
        [
            'attribute' => 'status',
            'label' => 'Status',
            'value' => 'status',
            'headerOptions' => ['style' => 'width:80px; text-align: center;'],
            'contentOptions' => ['style' => 'width:80px;'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width:51px; text-align: center;'],
        ],
    ];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-peminjaman']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // // your toolbar can include the additional full export menu
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