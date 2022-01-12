<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\DataBukuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\base\DataBuku;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\ListView;

$this->title = 'Data Buku Perpustakaan';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>

<div class="site-index">
    <div id="liveAlertPlaceholder"></div>
    <!-- <div class="alert alert-success">
        Pemesanan telah berhasil. Silahkan ambil buku yang telah dipesan di perpustakaan sekolah.
    </div> -->
    <!-- <a class="btn btn-primary" href="index.php?r=site%2Fdatabuku"><i class="fa fa-refresh"></i></a> -->
    <h3 style="text-align: center;">Daftar Buku Perpustakaan</h3>
    <h4 style="text-align: center;">SD Al-Irsyad 02 Cilacap</h4>
    <?php //echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <p style="text-align: center;">
        <?= Html::a('Cari Buku', '#', ['class' => 'btn btn-info search-button', 'style' => 'width: 100px;']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model, $item, $key, $widgets) {
    ?>
        <div class="row border" style="font-size:12px; margin:1px;">
            <div>
                <img src="/img/defaultbook.png" style="height: 150px;">
            </div>
            <div class="col">
                <h4 class="text-blue"><?php echo $model->judul_buku; ?></h4>
                <p><i class="fa fa-book"></i> <?php echo $model->akses; ?></p>
                <p><i class="fa fa-check-square-o "></i> <?php echo $model->ketersediaan; ?></p>
                <p><i class="fa fa-server"></i> <?php echo $model->lokasi_ruang; ?></p>
            </div>
            <div style="margin: 5px;">
                <?= Html::a('Lihat Detail', ['data-buku/view', 'id' => $model->id_buku], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Pesan Buku', ['peminjaman/pemesanan', 'id' => $model->id_buku], ['class' => 'btn btn-success'], ['id' => 'liveAlertBtn']) ?>
                <!-- <?= Html::a('Pesan Buku', ['peminjaman/pemesanan'], ['class' => 'btn btn-success', 'style' => 'width: 100px;']) ?> -->
                <!-- <button type="button" class="btn btn-success" id="liveAlertBtn">Pesan Buku</button> -->
                <!-- <button type="button" class="btn btn-success" id="liveAlertBtn">Pesan Buku</button> -->
            </div>
        </div>
    <?php
        }
    ]);
    ?>
</div>
<script>
    var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    var alertTrigger = document.getElementById('liveAlertBtn')

    function alert(message, type) {
        var wrapper = document.createElement('div')
        wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '<a type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close" href="index.php?r=site%2Fdatabuku"><i class="fa fa-close"></i></a></div>'
        
        alertPlaceholder.append(wrapper)
    }

    if (alertTrigger) {
        alertTrigger.addEventListener('click', function() {
            alert('Pemesanan telah berhasil. Silahkan ambil buku yang telah dipesan di perpustakaan sekolah.', 'success')
        })
    }
</script>