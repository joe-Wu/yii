<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Tools';
?>
<div class="site-tools">
    <h1><?= Html::encode($this->title) ?></h1>
	
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'tools-form']); ?>
				<div class="row">
					<?= $form->field($model, 'MD5') ?>
					<?php echo '<pre>'.print_r($result_md5,true).'</pre>' ?>
				</div>

				<div class="row">
					<?= $form->field($model, 'BASE64') ?>
					<?php echo '<pre>'.print_r($result_base64,true).'</pre>' ?>
				</div>

				<div class="row">
					<div class="col-md-4"><?= $form->field($model, 'STR_REPLACE_OLD') ?></div>
					<div class="col-md-4"><?= $form->field($model, 'STR_REPLACE_NEW') ?></div>
					<div class="col-md-4"><?= $form->field($model, 'STR_REPLACE_STR') ?></div>
					<?php echo '<pre>'.print_r($result_str_replace,true).'</pre>' ?>
				</div>

				<div class="row">
					<?= $form->field($model, 'EXPLODE_IMPLODE') ?>
					<div class="col-md-6">
					EXPLODE
					<?php echo '<pre>'.print_r($result_explode,true).'</pre>' ?>
					</div>
					<div class="col-md-6">
					IMPLODE
					<?php echo '<pre>'.print_r($result_implode,true).'</pre>' ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4"><?= $form->field($model, 'SUBSTR_STR') ?></div>
					<div class="col-md-4"><?= $form->field($model, 'SUBSTR_START') ?></div>
					<div class="col-md-4"><?= $form->field($model, 'SUBSTR_LENGTH') ?></div>
					<?php echo '<pre>'.print_r($result_substr,true).'</pre>' ?>
				</div>
				<div class="row">
					POST
					<?php echo '<pre>'.print_r($result_POST,true).'</pre>' ?>
				</div>
				<br>
				<div class="row">
					<strong>
					trim()  - 移除字符串兩側的空白字符或其他預定義字符。<br>
					ltrim() - 移除字符串左側的空白字符或其他預定義字符。<br>
					rtrim() - 移除字符串右側的空白字符或其他預定義字符。<br>
					</strong>
				</div>
				<br>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'tools-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>