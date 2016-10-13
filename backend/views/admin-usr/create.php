<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AdminUsr */

$this->title = 'Create Admin Usr';
$this->params['breadcrumbs'][] = ['label' => 'Admin Usrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-usr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
