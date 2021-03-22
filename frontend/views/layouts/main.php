<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Donation;

AppAsset::register($this);
$donations= Donation::find()->where(['verification' => 'No', 'user_id' => Yii::$app->user->id]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-danger',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']], 
            ['label' => 'Alerts'." ".Html::tag('span', '0', ['class' => 'badge badge-light']), 
            'url' => ['/blood-alert/index']], 
            ['label' => 'Profile', 'url' => ['/donor-profile/profile','id' => Yii::$app->user->identity->id]],
            ['label' => 'Donations'." ".Html::tag('span', $donations->count(), ['class' => 'badge badge-light']), 
            'url' => ['/donation/index']],
            ['label' => 'History', 'url' => ['/donation/donation-history','id' => Yii::$app->user->identity->id]],
        ];
        $menuItems[] = [
            'label' => 'Logout (' .Yii::$app->user->identity->username. ')' ,
            'url' => ['/site/logout'],
            'linkOptions'=>[
              'data-method' => 'post'
            ]
         ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto text-white'],
        'items' => $menuItems,
        'encodeLabels' => false
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
