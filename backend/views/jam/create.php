<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jam */

$this->title = 'Create Jam';
$this->params['breadcrumbs'][] = ['label' => 'Jams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jam-create">

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
