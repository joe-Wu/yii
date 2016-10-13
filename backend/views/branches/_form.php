<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Companies;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'companies_company_id')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(Companies::find()->all(),'company_id','company_name'),
		'language' => 'en',
		'options' => ['placeholder' => 'Select a state ...'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); ?>
	

    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>

	<?= DatePicker::widget([
		'model' => $model,
		'attribute' => 'branch_created_date',
		'template' => '{addon}{input}',
			'clientOptions' => [
				'autoclose' => true,
				'format' => 'yyyy-mm-dd'
			]
	]);?>

    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
