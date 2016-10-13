<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AdminUsr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-usr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'admin_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_birthday')->textInput() ?>

    <?= $form->field($model, 'admin_company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_msn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_dutydate')->textInput() ?>

    <?= $form->field($model, 'admin_leftdate')->textInput() ?>

    <?= $form->field($model, 'admin_priv_code')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'admin_project_manager')->textInput() ?>

    <?= $form->field($model, 'admin_designer')->textInput() ?>

    <?= $form->field($model, 'admin_programmer')->textInput() ?>

    <?= $form->field($model, 'admin_system_engineer')->textInput() ?>

    <?= $form->field($model, 'admin_relationship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_status')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'update_account')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
