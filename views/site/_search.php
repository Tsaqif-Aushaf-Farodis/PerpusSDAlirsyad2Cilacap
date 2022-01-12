<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DataBukuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-data-buku-search">

    <?php $form = ActiveForm::begin([
        'action' => ['databuku'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'no_barcode')->textInput(['maxlength' => true, 'placeholder' => 'No Barcode']) ?> -->

    <?= $form->field($model, 'judul_buku')->textInput(['maxlength' => true, 'placeholder' => 'Judul Buku']) ?>

    <?php /* echo $form->field($model, 'kategori')->textInput(['maxlength' => true, 'placeholder' => 'Kategori']) */ ?>

    <!-- <?= $form->field($model, 'akses')->dropDownList(
        ['Select', 'Baca di tempat', 'Dapat dipinjam']
    ) ?>

    <?= $form->field($model, 'ketersediaan')->dropDownList(
        ['Select', 'Tersedia', 'Tidak Tersedia']
    ) ?> -->

    <?php /* echo $form->field($model, 'lokasi_perpustakaan')->textInput(['maxlength' => true, 'placeholder' => 'Lokasi Perpustakaan']) */ ?>

    <?php /* echo $form->field($model, 'lokasi_ruang')->textInput(['maxlength' => true, 'placeholder' => 'Lokasi Ruang']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?> -->
        <a type="button" class="btn btn-secondary" href="index.php?r=site%2Fdatabuku">Reset</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>