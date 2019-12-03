<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstra4\NavBar;
use yii\helpers\Url;

use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\components\rbac\MenuHelper;
use yii\widgets\Menu;

AppAsset::register($this);
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
<body class="authentication-bg">
<?php $this->beginBody() ?>

<div class="account-pages mt-5 mb-5">
            <div class="container">
                <?= $content ?>
            </div>
        </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>