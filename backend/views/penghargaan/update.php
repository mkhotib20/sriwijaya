<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Penghargaan */

$this->title = 'Update Penghargaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penghargaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penghargaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
