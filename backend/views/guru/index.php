<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guru';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-index">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">List <?= $this->title ?></h4>
                <p>
                    <?= Html::a('Create Guru', ['create'], ['class' => 'btn btn-primary']) ?>
                </p>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'nama',
                        'usia',
                        'mengajar',
                        'deskripsi:ntext',
                        //'created_at',
                        //'updated_at',
                        [
                            'class' => 'backend\components\ActionColumn',
                            'template' => '{view} {update} {delete} {penghargaan}',
                            'header'=> "Pilihan"
                        ],
                    ],
                ]); ?>

            </div>
        </div>
    </div>
</div>
</div>
