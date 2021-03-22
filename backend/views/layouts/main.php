<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use yii\web\ForbiddenHttpException;
use common\widgets\Alert;
use common\models\AdminProfile;
use common\models\Donation;

AppAsset::register($this);

$admin_profile = AdminProfile::findOne(['user_id' => Yii::$app->user->id]);
$donation = Donation::find()->innerJoinWith('alert')->where(
['blood_alert.branch_id' => $admin_profile->branch_id])->andWhere([
'donation.verification' => 'No']);
$all_donations = Donation::find()->innerJoinWith('alert')->where([
    'donation.verification' => 'No'
]);
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
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index'],
        'visible' => Yii::$app->user->can('backend-login')],
        ['label' => 'Profile', 'url' => ['/admin-profile/profile',
        'id' => Yii::$app->user->identity->id],
        'visible' => Yii::$app->user->can('backend-login')],
        ['label' => 'Donors', 'url' => ['/donor/index'],
        'visible' => Yii::$app->user->can('backend-login')],
        ['label' => 'Admin', 'url' => ['/admin/index'],
        'visible' => Yii::$app->user->can('read-admin')],
        ['label' => 'Alerts', 'url' => ['/blood-alert/index'],
        'visible' => Yii::$app->user->can('backend-login')],
        ['label' => 'Branches', 'url' => ['/branch/index'],
        'visible' => Yii::$app->user->can('backend-login')],
        ['label' => 'Donations'." ".Html::tag('span', $donation->count(), ['class' => 'badge badge-light']), 
        'url' => ['/donation/index'],
        'visible' => Yii::$app->user->can('read-donation')],
        ['label' => 'Donations'." ".Html::tag('span', $all_donations->count(), ['class' => 'badge badge-light']), 
        'url' => ['/donation/index'],
        'visible' => Yii::$app->user->can('read-all-donations')]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' .Yii::$app->user->identity->username. ')' ,
            'url' => ['/site/logout'],
            'linkOptions'=>[
              'data-method' => 'post'
            ]
         ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
        'encodeLabels' => false
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
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
