<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jam */

$this->title = 'Update Jam: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jam-update">
    
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
