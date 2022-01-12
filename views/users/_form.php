<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Peminjaman', 
        'relID' => 'peminjaman', 
        'value' => \yii\helpers\Json::encode($model->peminjamen),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <!-- <?= $form->field($model, 'user_id')->textInput(['placeholder' => 'User']) ?> -->

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password']) ?>

    <?= $form->field($model, 'authKey')->textInput(['maxlength' => true, 'placeholder' => 'AuthKey']) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true, 'placeholder' => 'AccessToken']) ?>

    <!-- <?= $form->field($model, 'role')->textInput(['maxlength' => true, 'placeholder' => 'Role']) ?> -->

    <?= $form->field($model, 'role')->dropDownList(
        [
            'Admin' => 'Admin', 
            'Petugas' => 'Petugas',
            'Wali Santri' => 'Wali Santri'
        ],['prompt' =>'Select']
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>

    <!-- <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Peminjaman'),
            'content' => $this->render('_formPeminjaman', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->peminjamen),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?> -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
