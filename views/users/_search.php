<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-users-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'user_id')->textInput(['placeholder' => 'User']) ?> -->

    <!-- <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?> -->

    <!-- <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password']) ?> -->

    <!-- <?= $form->field($model, 'authKey')->textInput(['maxlength' => true, 'placeholder' => 'AuthKey']) ?> -->

    <!-- <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true, 'placeholder' => 'AccessToken']) ?> -->

    <?= $form->field($model, 'role')->dropDownList(
        [
            'Admin' => 'Admin', 
            'Petugas' => 'Petugas',
            'Wali Santri' => 'Wali Santri'
        ],['prompt' =>'Select']
    ) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?php /* echo $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) */ ?>

    <?php /* echo $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
