<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DataBuku */

$this->title = 'Update Data Buku: ' . ' ' . $model->id_buku;
$this->params['breadcrumbs'][] = ['label' => 'Data Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_buku, 'url' => ['view', 'id' => $model->id_buku]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="data-buku-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
