<?php

use app\models\DataBuku;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;
use kartik\select2\Select2;
use kartik\datecontrol\Module;

/* @var $this yii\web\View */
/* @var $model app\models\DataBuku */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="data-buku-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_buku')->textInput() ?>

    <?= $form->field($model, 'no_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pengadaan')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Select',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <!-- <?= $form->field($model, 'tanggal_pengadaan')->textInput() ?> -->

    <?= $form->field($model, 'judul_buku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis_sumber')->dropDownList(
        ['Hadiah/Hibah' => 'Hadiah/Hibah', 'Pembelian' => 'Pembelian'],['prompt' =>'Select']
    ) ?>

    <?= $form->field($model, 'kategori')->dropDownList(
        ['Koleksi Referensi' => 'Koleksi Referensi', 'Koleksi Umum' => 'Koleksi Umum'],['prompt' =>'Select']
    ) ?>

    <?= $form->field($model, 'akses')->dropDownList(
        ['Baca di tempat' => 'Baca di tempat', 'Dapat dipinjam' => 'Dapat dipinjam'],['prompt' =>'Select']
    ) ?>

    <?= $form->field($model, 'ketersediaan')->dropDownList(
        ['Tersedia' => 'Tersedia', 'Tidak Tersedia' => 'Tidak Tersedia'],['prompt' =>'Select']
    ) ?>

    <?= $form->field($model, 'lokasi_perpustakaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lokasi_ruang')->dropDownList(
        ['Ruang Koleksi Referensi' => 'Ruang Koleksi Referensi', 'Ruang Baca Umum' => 'Ruang Baca Umum'],['prompt' =>'Select']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
