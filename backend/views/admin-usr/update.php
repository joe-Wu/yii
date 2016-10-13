<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdminUsr */

$this->title = 'Update Admin Usr: ' . ' ' . $model->admin_id;
$this->params['breadcrumbs'][] = ['label' => 'Admin Usrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admin_id, 'url' => ['view', 'id' => $model->admin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-usr-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
