<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KunjunganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kunjungans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kunjungan-index">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= Html::encode($this->title) ?></h4>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'ip',
            'time',
            'quarter',
            'produk',

            [
                'class' => 'backend\components\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header'=> "Pilihan"
            ],
        ],
    ]); ?>


            </div>
        </div>
    </div>
</div>

</div>
