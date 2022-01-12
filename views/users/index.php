<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="users-index">

<h1 style="text-align: center;">Sistem Informasi Perpustakaan</h1>
    <h2 style="text-align: center;">SD Al-Irsyad 02 Cilacap</h2>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="text-align: center;">
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success', 'style' => 'width: 100px;']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button', 'style' => 'width: 100px;']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        [
            'class' => 'yii\grid\SerialColumn',
            'contentOptions' => ['style' => 'width:10px;'],
        ],
        // 'user_id',
        [
            'attribute' => 'username',
            'label' => 'Username',
            'value' => 'username',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:150px;'],
        ],
        [
            'attribute' => 'password',
            'label' => 'Password',
            'value' => 'password',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:150px;'],
        ],
        // 'authKey',
        // 'accessToken',
        [
            'attribute' => 'role',
            'label' => 'Role',
            'value' => 'role',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:150px;'],
        ],
        [
            'attribute' => 'name',
            'label' => 'Name',
            'value' => 'name',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:190px;'],
        ],
        // 'email:email',
        [
            'attribute' => 'email',
            'label' => 'Email',
            'value' => 'email',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:190px;'],
        ],
        [
            'attribute' => 'phone',
            'label' => 'Nomor Handphone',
            'value' => 'phone',
            'headerOptions' => ['style' => 'text-align: center;'],
            'contentOptions' => ['style' => 'width:190px;'],
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions' => ['style' => 'width:53px; text-align: center;'],
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-users']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        // 'toolbar' => [
        //     '{export}',
        //     ExportMenu::widget([
        //         'dataProvider' => $dataProvider,
        //         'columns' => $gridColumn,
        //         'target' => ExportMenu::TARGET_BLANK,
        //         'fontAwesome' => true,
        //         'dropdownOptions' => [
        //             'label' => 'Full',
        //             'class' => 'btn btn-default',
        //             'itemsBefore' => [
        //                 '<li class="dropdown-header">Export All Data</li>',
        //             ],
        //         ],
        //         'exportConfig' => [
        //             ExportMenu::FORMAT_PDF => false
        //         ]
        //     ]) ,
        // ],
    ]); ?>

</div>
