<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeminjamanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-peminjaman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'kode_peminjaman')->textInput(['placeholder' => 'Kode Peminjaman']) ?> -->

    <?= $form->field($model, 'id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\webvimark\modules\UserManagement\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Choose User'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'id_buku')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\DataBuku::find()->orderBy('judul_buku')->asArray()->all(), 'id_buku', 'judul_buku'),
        'options' => ['placeholder' => 'Choose Data buku'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <!-- <?= $form->field($model, 'tgl_pinjam')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Select',
                'autoclose' => true
            ]
        ],
    ]); ?> -->

    <!-- <?= $form->field($model, 'tgl_kembali')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Select',
                'autoclose' => true
            ]
        ],
    ]); ?> -->

    <?php /* echo $form->field($model, 'jadwal_tgl_kembali')->textInput(['placeholder' => 'Jadwal Tgl Kembali']) */ ?>

    <?= $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
        'data' => [
            'Dipesan' => 'Dipesan',
            'Dipinjam' => 'Dipinjam',
            'Dikembalikan' => 'Dikembalikan'
        ],
        'options' => ['placeholder' => 'Choose Users'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
