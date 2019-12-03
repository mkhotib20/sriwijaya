<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMusik */

$this->title = 'Update Alat Musik: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alat Musiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alat-musik-update">

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
