<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kunjungan */

$this->title = 'Update Kunjungan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kunjungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kunjungan-update">
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
