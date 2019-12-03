<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AmKategori */

$this->title = 'Create Am Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Am Kategoris', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="am-kategori-create">

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
