<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdminUsrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-usr-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'admin_account') ?>

    <?= $form->field($model, 'admin_password') ?>

    <?= $form->field($model, 'admin_name') ?>

    <?= $form->field($model, 'admin_nickname') ?>

    <?php // echo $form->field($model, 'admin_gender') ?>

    <?php // echo $form->field($model, 'admin_birthday') ?>

    <?php // echo $form->field($model, 'admin_company') ?>

    <?php // echo $form->field($model, 'admin_title') ?>

    <?php // echo $form->field($model, 'admin_tel') ?>

    <?php // echo $form->field($model, 'admin_home') ?>

    <?php // echo $form->field($model, 'admin_mobile') ?>

    <?php // echo $form->field($model, 'admin_email') ?>

    <?php // echo $form->field($model, 'admin_msn') ?>

    <?php // echo $form->field($model, 'admin_dutydate') ?>

    <?php // echo $form->field($model, 'admin_leftdate') ?>

    <?php // echo $form->field($model, 'admin_priv_code') ?>

    <?php // echo $form->field($model, 'admin_project_manager') ?>

    <?php // echo $form->field($model, 'admin_designer') ?>

    <?php // echo $form->field($model, 'admin_programmer') ?>

    <?php // echo $form->field($model, 'admin_system_engineer') ?>

    <?php // echo $form->field($model, 'admin_relationship') ?>

    <?php // echo $form->field($model, 'admin_remark') ?>

    <?php // echo $form->field($model, 'admin_status') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'update_account') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
