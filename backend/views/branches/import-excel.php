<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
	
	<h4><?= 'Okay save' ?></h4>
	
    <p>
        <?= Html::a('Go Branches Index', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
