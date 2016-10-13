<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdminUsrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Usrs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-usr-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Admin Usr', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'admin_id',
            'admin_account',
            'admin_password',
            'admin_name',
            'admin_nickname',
            // 'admin_gender',
            // 'admin_birthday',
            // 'admin_company',
            // 'admin_title',
            // 'admin_tel',
            // 'admin_home',
            // 'admin_mobile',
            // 'admin_email:email',
            // 'admin_msn',
            // 'admin_dutydate',
            // 'admin_leftdate',
            // 'admin_priv_code:ntext',
            // 'admin_project_manager',
            // 'admin_designer',
            // 'admin_programmer',
            // 'admin_system_engineer',
            // 'admin_relationship',
            // 'admin_remark',
            // 'admin_status',
            // 'create_time',
            // 'update_time',
            // 'update_account',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
