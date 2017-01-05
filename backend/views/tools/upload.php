<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\uploadForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUpload;

$this->title = 'upload';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-upload">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
			
			<?= Html::dropDownList('game', null, [], [
				'id'=>'game', 
				'prompt'=>'請選擇節目', 
				'style' => ['display' => 'none'],
				'class' => 'form-control'
			]); ?>
			
			
			<?= FileUpload::widget([
    'model' => $model,
    'attribute' => 'file',
    'url' => ['tools/uploadajax'],
    'clientOptions' => [
        'maxFileSize' => 2000000
    ],
    'clientEvents' => [
        'fileuploaddone' => 'function(e, data) {
								$(\'#game\').html( data.result );
                                $(\'#game\').show();
								
                            }',
        'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
    ],
]);?>

			<?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
