<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AdminUsr */

$this->title = $model->admin_id;
$this->params['breadcrumbs'][] = ['label' => 'Admin Usrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-usr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->admin_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->admin_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'admin_id',
            'admin_account',
            'admin_password',
            'admin_name',
            'admin_nickname',
            'admin_gender',
            'admin_birthday',
            'admin_company',
            'admin_title',
            'admin_tel',
            'admin_home',
            'admin_mobile',
            'admin_email:email',
            'admin_msn',
            'admin_dutydate',
            'admin_leftdate',
            'admin_priv_code:ntext',
            'admin_project_manager',
            'admin_designer',
            'admin_programmer',
            'admin_system_engineer',
            'admin_relationship',
            'admin_remark',
            'admin_status',
            'create_time',
            'update_time',
            'update_account',
        ],
    ]) ?>

</div>
