<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kursus */

$this->title = 'Create Kursus';
$this->params['breadcrumbs'][] = ['label' => 'Kursuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kursus-create">

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
