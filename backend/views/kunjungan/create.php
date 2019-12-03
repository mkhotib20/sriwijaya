<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kunjungan */

$this->title = 'Create Kunjungan';
$this->params['breadcrumbs'][] = ['label' => 'Kunjungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunjungan-create">

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
