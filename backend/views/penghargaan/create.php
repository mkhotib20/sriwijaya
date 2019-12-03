<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Penghargaan */

$this->title = 'Create Penghargaan';
$this->params['breadcrumbs'][] = ['label' => 'Penghargaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penghargaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
