<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sejarah */

$this->title = 'Create Sejarah';
$this->params['breadcrumbs'][] = ['label' => 'Sejarahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sejarah-create">

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
