<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PenghargaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penghargaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penghargaan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penghargaan', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'deskripsi:ntext',
            'tahun',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
