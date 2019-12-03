<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AmKategori */

$this->title = 'Create Am Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Am Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="am-kategori-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
