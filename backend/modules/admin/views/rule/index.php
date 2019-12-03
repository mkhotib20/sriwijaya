<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> 
                <h4 class="card-title">
                    <?= Html::encode($this->title) ?> 
                </h4>
            </div> 
            <div class="card-content"> 
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <p>
        <?= Html::a(Yii::t('app', 'Create Rule'), ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                        'label' => Yii::t('app', 'Name'),
                    ],                        [
                                        'class' => 'backend\components\ActionColumn',
                                        'template' => '{view} {update} {delete}',
                                        'header'=> "Pilihan"
                                    ],
                ],
            ]);
            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
