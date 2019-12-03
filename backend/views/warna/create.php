<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Warna */

$this->title = 'Create Warna';
$this->params['breadcrumbs'][] = ['label' => 'Warnas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warna-create">
    
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
