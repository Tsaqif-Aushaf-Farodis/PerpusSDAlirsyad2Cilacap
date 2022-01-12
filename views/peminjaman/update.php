<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */

$this->title = 'Update Peminjaman: ' . ' ' . $model->kode_peminjaman;
$this->params['breadcrumbs'][] = ['label' => 'Peminjaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode_peminjaman, 'url' => ['view', 'id' => $model->kode_peminjaman]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peminjaman-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
