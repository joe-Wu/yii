<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use kartik\export\ExportMenu;
// use kartik\grid\Module;

$query = new \yii\db\Query;

// compose the query
$query->select('*')
    ->from('departments')
    // ->leftJoin('companies','departments.branches_branch_id = companies.company_id ')
    // ->leftJoin('branches','departments.companies_company_id = branches.branch_id ')
    ->limit(10);
// build and execute the query
$rows = $query->all();


// alternatively, you can create DB command and execute it
// $command = $query->createCommand();
// $command->sql returns the actual SQL
// $rows = $command->queryAll();

// $connection = Yii::$app->db;

// $sql = "SELECT * FROM `branches` LEFT JOIN `companies`  WHERE branch_id > 8 ORDER BY  branch_id";

// $command = $connection->createCommand($sql);

// $result = $command->queryAll();

echo '<pre>'.print_r($rows,true).'</pre>';


/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?>
	</p>
	<?php
	$gridColumns = [
		['class' => 'yii\grid\SerialColumn'],
		'branch_id',
		'companies_company_id',
		'branch_name',
		'branch_address',
		'branch_created_date',
		'branch_status',
		['class' => 'yii\grid\ActionColumn'],
	];

	// Renders a export dropdown menu
	echo ExportMenu::widget([
		'dataProvider' => $dataProvider,
		'columns' => $gridColumns
	]);
	?>
	<?php Pjax::begin(); 
		// You can choose to render your own GridView separately
		echo \kartik\grid\GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'columns' => $gridColumns
		]);
	 Pjax::end(); ?>

</div>
