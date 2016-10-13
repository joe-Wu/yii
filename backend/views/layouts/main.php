<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Wu Joe Backend',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
		'renderInnerContainer' => false,
    ]);
    // $menuItems = [
        // ['label' => 'Home', 'url' => ['/site/index']],
    // ];
    // if (Yii::$app->user->isGuest) {
        // $menuItems[] = ['label' => 'Login', 'url' => ['/user/security/login']];
    // } else {
        // $menuItems[] = ['label' => 'gii', 'url' => ['/gii']];
        // $menuItems[] = ['label' => 'upload', 'url' => ['/companies/create']];
        // $menuItems[] = ['label' => 'tools', 'url' => ['/site/tools']];
        // $menuItems[] = ['label' => 'ImportExcel', 'url' => ['/branches/import-excel']];
		 // $menuItems[] = [
            // 'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            // 'url' => ['/user/security/logout'],
            // 'linkOptions' => ['data-method' => 'post']
			// ];
		
    // }
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = ['label' => 'gii', 'url' => ['/gii']];
        $menuItems[] = ['label' => 'upload', 'url' => ['/companies/create']];
        $menuItems[] = ['label' => 'tools', 'url' => ['/site/tools']];
        $menuItems[] = ['label' => 'ImportExcel', 'url' => ['/branches/import-excel']];
		$menuItems[] = [
			'label' => 'Dropdown',
            
			];
		$menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->admin_account . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
			];
		
    }
	
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>