<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WarnaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warna-index">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= $this->title ?></h4>
                <p>
                    <?= Html::a('Tambah Warna', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>
                <?= GridView::widget([
                    'class' => 'table table-hover table-centered mb-0',
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-hover table-centered mb-0'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'hex',
                        'nama',
                        'created_at',
                        'updated_at',
                        
                        ['class' => 'backend\components\ActionColumn', 'header'=> "Pilihan"],
                    ],
                ]); ?>
                <canvas id="bar" height="350" class="mt-4"></canvas>

            </div>
        </div>
    </div>
</div>
</div>