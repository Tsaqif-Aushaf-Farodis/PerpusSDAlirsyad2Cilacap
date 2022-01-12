<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use webvimark\modules\UserManagement\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Peminjaman */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="peminjaman-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <!-- <?= $form->field($model, 'kode_peminjaman')->textInput(['placeholder' => 'Kode Peminjaman']) ?> -->

    <?= $form->field($model, 'id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\webvimark\modules\UserManagement\models\User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => 'Select'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'id_buku')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\DataBuku::find()->orderBy('judul_buku')->asArray()->all(), 'id_buku', 'judul_buku'),
        'options' => ['placeholder' => 'Select'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tgl_pesan')->widget(\kartik\datecontrol\DateControl::classname(), [
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

    <?= $form->field($model, 'tgl_pinjam')->widget(\kartik\datecontrol\DateControl::classname(), [
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

    <?= $form->field($model, 'tgl_kembali')->widget(\kartik\datecontrol\DateControl::classname(), [
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

<?= $form->field($model, 'jadwal_tgl_kembali')->widget(\kartik\datecontrol\DateControl::classname(), [
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

    <!-- <?= $form->field($model, 'status')->dropDownList(
        [
            'Dipesan' => 'Dipesan',
            'Dipinjam' => 'Dipinjam',
            'Dikembalikan' => 'Dikembalikan'
        ],['prompt' =>'Select']
    ) ?> -->

    <?= $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
        'data' => [
            'Dipesan' => 'Dipesan',
        ],
        'options' => ['placeholder' => 'Select'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
