<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SejarahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sejarahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sejarah-index">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= Html::encode($this->title) ?></h4>
                <p>
                    <?= Html::a('Create Sejarah', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judul',
            'deskripsi:ntext',
            'img',
            'tanggal',

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
