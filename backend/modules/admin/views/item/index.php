<?php

use backend\components\rbac\RouteRule;
use backend\components\rbac\Configs;
use yii\helpers\Html;
use yii\grid\GridView;

// $this->title = 'Permission';
$this->registerCssFile(Yii::getAlias('@web/'). 'css/style-grid.css', ['depends'=>['backend\assets\AppAsset']]); 

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('app', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
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
                <div class="table-responsive">
                    <div class="tabbable-line boxless tabbable-reversed portlet light">
                        <div class="col-md-12">
                            <?= Html::a(Yii::t('app', 'Create '.$labels['Item']), ['create'], ['class' => 'btn btn-sm btn-primary']) ?>
                        </div>
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
                                            ['class' => 'yii\grid\SerialColumn'],
                                            [
                                                'attribute' => 'name',
                                                'label' => Yii::t('app', 'Name'),
                                            ],
                                            // [
                                            //     'attribute' => 'ruleName',
                                            //     'label' => Yii::t('app', 'Rule Name'),
                                            //     'filter' => $rules
                                            // ],
                                            [
                                                'attribute' => 'description',
                                                'label' => Yii::t('app', 'Description'),
                                            ],
                                            // ['class' => 'yii\grid\ActionColumn',],
                                            [
                                                'class' => 'backend\components\ActionColumn',
                                                'template' => '{view} {update} {delete}',
                                                'header'=> "Pilihan"
                                            ],
                                        ],
                                    ])
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

