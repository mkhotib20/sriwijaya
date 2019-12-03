<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMusik */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Alat Musik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alat-musik-view">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Detail <?= $this->title ?></h4>
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Variasi', ['variasi', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    // 'class' => 'table table-hover table-centered mb-0',
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'nama',
                        'harga_dasar',
                        'kategori',
                        'deskripsi:ntext',
                        'created_at',
                        'updated_at',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>
</div>
