<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kunjungan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kunjungans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kunjungan-view">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
    <h4 class="header-title">Detail <?= Html::encode($this->title) ?></h4>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ip',
            'time',
            'quarter',
            'produk',
        ],
    ]) ?>

    </div>
        </div>
    </div>
</div>
</div>
