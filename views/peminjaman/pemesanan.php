<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = 'Pemesanan Buku';
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peminjaman-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formpemesanan', [
        'model' => $model,
    ]) ?>

</div>
