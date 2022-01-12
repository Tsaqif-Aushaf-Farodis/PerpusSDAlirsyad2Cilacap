<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DataBuku */

$this->title = 'Input Data Buku';
$this->params['breadcrumbs'][] = ['label' => 'Data Buku', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-buku-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
