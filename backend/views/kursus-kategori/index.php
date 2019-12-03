<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KursusKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kursus Kategoris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kursus-kategori-index">
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= Html::encode($this->title) ?></h4>
                <p>
                    <?= Html::a('Create Kursus Kategori', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',

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
