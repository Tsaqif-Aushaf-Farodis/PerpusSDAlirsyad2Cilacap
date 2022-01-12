<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')) : ?>

        <div class="alert alert-success">
            Terima kasih sudah menghubungi kami. Kami akan merespon Anda sesegera mungkin.
        </div>

        <p>
            Perhatikan bahwa jika Anda mengaktifkan debugger Yii, Anda seharusnya dapat melihat pesan email di panel email debugger.
            <?php if (Yii::$app->mailer->useFileTransport) : ?>
            Karena aplikasi dalam mode pengembangan, email tidak dikirim tetapi disimpan sebagai file di
            <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
            <?php endif; ?>
        </p>

    <?php else : ?>

        <p>
            Jika Anda memiliki tanggapan atau pertanyaan seputar sistem informasi perpustakaan ini, silakan isi formulir berikut untuk menghubungi kami. Terima kasih.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>