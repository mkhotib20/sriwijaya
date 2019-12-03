<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AmKategoriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Am Kategoris';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="am-kategori-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Am Kategori', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            [
                'class' => 'backend\components\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header'=> "Pilihan"
            ],
        ],
    ]); ?>


</div>
