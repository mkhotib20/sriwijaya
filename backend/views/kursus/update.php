<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kursus */

$this->title = 'Update Kursus: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kursuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->nama]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kursus-update">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    'kategori' => $kategori,
                    'fileUpload' => $fileUpload,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
