<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile(Yii::getAlias('@web/'). 'css/style-grid.css', ['depends'=>['backend\assets\AppAsset']]); 

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
                        <?= Html::a(Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
                        <?= Html::a(Yii::t('app', 'Easy Menu Order'), ['/admin-override/menu-easy-order'], ['class' => 'btn btn-sm btn-info']) ?>
                    </div>
                <div class="table-responsive">
                    <div class="tabbable-line boxless tabbable-reversed portlet light">
                        <div class="tab-content">
                            <div class="ownership-status-form">
                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'tableOptions' => ['class' => 'table table-bordered table-sm'],
                                    'pager' => [
                                        'firstPageLabel' => '<i class="fa fa-fast-backward"></i>',
                                        'lastPageLabel' => '<i class="fa fa-fast-forward"></i>',
                                        'options' => [
                                            'class' => 'pagination justify-content-end',
                                        ],
                                        'linkOptions' => ['class' => 'page-link'],
                                        'activePageCssClass' => 'page-item active',
                                        'disabledPageCssClass' => 'disabled',
                                    ],
                                    'columns' => [
                                        [
                                            'class' => 'yii\grid\SerialColumn',
                                            'headerOptions' => ['style' => 'width: 5%;'],
                                        ],
                                        'name',
                                        // [
                                        //     'attribute' => 'menuParent.name',
                                        //     'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                                        //         'class' => 'form-control', 'id' => null
                                        //     ]),
                                        //     'label' => Yii::t('app', 'Parent'),
                                        // ],
                                        [
                                            'label' => 'Parent',
                                            'attribute' => 'menuParent.name',
                                            'filter' => Html::activeTextInput($searchModel, 'parent_name', [
                                                'class' => 'form-control', 'id' => null
                                            ]),
                                            'value' => function($model){
                                                if (empty($model->parent)) {
                                                    return 'is Parent';
                                                } else return $model->menuParent->name;
                                            }
                                        ],
                                        'route',
                                        // 'order',
                                        [
                                            'label' => 'Order',
                                            'attribute' => 'order',
                                            'headerOptions' => ['style' => 'width: 10%;'],
                                            // 'contentOptions' => ['style' => 'text-align:center']
                                        ],
                                        [
                                            'label' => 'Icon',
                                            'value' => function($model){
                                                $model = json_decode($model->data, true);
                                                return '<i class="'.$model['icon'].'">';
                                            },
                                            'format' => 'raw',
                                            'headerOptions' => ['style' => 'color: #337ab7'],
                                            // 'contentOptions' => ['style' => 'text-align:center']
                                        ],
                                        // ['class' => 'yii\grid\ActionColumn'],
                                        [
                                        'class' => 'backend\components\ActionColumn',
                                        'template' => ' {update} {delete}',
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
    </div>
</div>

