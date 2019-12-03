<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlatMusikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alat Musik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-musik-index">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= $this->title ?></h4>
                <p>
                    <?= Html::a('Tambah Alat Musik', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-hover table-centered mb-0'],
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id',
                        'nama',
                        'harga_dasar',
                        'is_diskon',
                        'deskripsi:ntext',
                        //'created_at',
                        //'updated_at',

                        [
                            'class' => 'backend\components\ActionColumn',
                            'template' => '{view} {update} {delete} {variasi}',
                            'header'=> "Pilihan"
                        ],
                    ],
                ]); ?>
                <canvas id="bar" height="350" class="mt-4"></canvas>

            </div>
        </div>
    </div>
</div>

</div>
