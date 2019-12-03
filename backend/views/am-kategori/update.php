<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AmKategori */

$this->title = 'Update Am Kategori: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Am Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="am-kategori-update">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                        'icons' => $icons
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
