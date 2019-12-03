<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sejarah */

$this->title = 'Update Sejarah: ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Sejarah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sejarah-update">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    'fileUpload' => $fileUpload,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
