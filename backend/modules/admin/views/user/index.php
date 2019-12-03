<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel mdm\admin\models\searchs\User */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
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
                    <div class="col-md-12">
                        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
                    </div>
                        <div class="table-responsive">
                        <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],
                                    'username',
                                    'email:email',
                                    'created_at:date',
                                    [
                                        'attribute' => 'status',
                                        'value' => function($model) {
                                            return $model->status == 0 ? 'Inactive' : 'Active';
                                        },
                                        'filter' => [
                                            0 => 'Inactive',
                                            10 => 'Active'
                                        ]
                                    ],
                                    [
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
