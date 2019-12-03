<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMusik */

$this->title = 'Tambah Alat Musik';
$this->params['breadcrumbs'][] = ['label' => 'Alat Musiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-musik-create">
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
