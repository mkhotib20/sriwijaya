<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Users */

$this->title = 'Add Admin';
$this->params['breadcrumbs'][] = ['label' => 'Admin Management', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tabbable-line boxless tabbable-reversed portlet light bordered">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>
</div>