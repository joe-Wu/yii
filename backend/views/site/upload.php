<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\uploadForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'upload';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-upload">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
			
			<?= $form->field($model, 'game') ?>
			
			<?= $form->field($model, 'file')->fileInput() ?>

			<div class="form-group">
				<?= Html::submitButton('Save',['class'=>'btn btn-primary']) ?>
			</div>

			<?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
