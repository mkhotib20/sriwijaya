<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\DropdownHelpers;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Management';
$this->params['breadcrumbs'][] = $this->title;

$js = <<<JS
    $(document).ready(function() { 
        $('.select2').each(function () {
            $(this).select2({
                placeholder: "Select one",
                allowClear: true,
                dropdownAutoWidth : true,
                width: "100%"
            });
        });
        
	$('.pickadate').pickadate({
		format: 'yyyy-mm-dd',
	});
    });
JS;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="padding-bottom: 0px !important"> 
                <h4 class="card-title">
                    <?= Html::encode($this->title) ?> 
                </h4>
                <?= Html::a('New Admin', ['create'], ['class' => 'btn btn-sm btn-primary pull-right']) ?>
            </div> 
            <div class="card-content"> 
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php
                            Pjax::begin(['enablePushState' => true, 'timeout' => 4000, 'id' => 'myPjax']);
                            $this->registerJs($js, \yii\web\View::POS_END);
                            ?>
                            <?=
                            GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'tableOptions' => ['class' => 'table table-bordered table-sm'],
                                'columns' => [
                                    [
                                        'class' => 'yii\grid\SerialColumn',
                                        'contentOptions' => ['style' => 'text-align:center;'],
                                    ],
                                    [
                                        'label' => 'Username',
                                        'attribute' => 'name',
                                        'filterInputOptions' => [
                                            'class' => 'form-control form-control-sm',
                                        ],
                                    ],
                                    [
                                        'label' => 'Email',
                                        'attribute' => 'email',
                                        'filterInputOptions' => [
                                            'class' => 'form-control form-control-sm',
                                        ],
                                    ],
                                    [
                                        'label' => 'User Telegram',
                                        'attribute' => 'user_telegram',
                                        'filterInputOptions' => [
                                            'class' => 'form-control form-control-sm',
                                        ],
                                    ],
//                                    [
//                                        'label' => 'Type',
//                                        'attribute' => 'user_type',
//                                        'filterInputOptions' => [
//                                            'class' => 'form-control form-control-sm',
//                                        ],
//                                    ],
//                                    [
//                                        'label' => 'Created By',
//                                        'attribute' => 'created_by_name',
//                                        'filterInputOptions' => [
//                                            'class' => 'form-control form-control-sm',
//                                        ],
//                                    ],
//                                    [
//                                        'attribute' => 'created_date',
//                                        'filterInputOptions' => [
//                                            'class' => 'form-control form-control-sm pickadate text-center',
//                                        ],
//                                    ],
//                                    [
//                                        'label' => 'Client',
//                                        'attribute' => 'client_name',
//                                        'filterInputOptions' => [
//                                            'class' => 'form-control form-control-sm',
//                                        ],
//                                        'value' => function ($model)
//                                        {
//                                            return $model->client_name ? $model->client_id . ' - ' . $model->client_name : '-';
//                                        }
//                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{view} {update} {delete}',
                                        'header' => 'Actions',
                                        'headerOptions' => ['style' => 'width: 15%;text-align:center;color: #337ab7'],
                                        'contentOptions' => ['style' => 'text-align:center;'],
                                        'buttons' => [
                                            'view' => function ($url)
                                            {
                                                return Html::a('<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>', $url, [
                                                            'title' => 'View',
                                                            'data-pjax' => '0',
                                                ]);
                                            },
                                            'update' => function ($url)
                                            {
                                                return Html::a('<button type="button" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></button>', $url, [
                                                            'title' => 'Update',
                                                            'data-pjax' => '0',
                                                ]);
                                            },
                                            'delete' => function ($url)
                                            {
                                                return Html::a('<button type="button" class="btn btn-info btn-sm"><i class="fa fa-trash"></i></button>', $url, [
                                                            'title' => 'Delete',
                                                            'data-pjax' => '0',
                                                            'data' => [
                                                                'method' => 'post',
                                                                'confirm' => 'Are you sure?',
//                                                                'params' => ['id' => $model->id],
                                                            ],
                                                ]);
                                            },
                                        ]
                                    ],
                                ],
                            ]);
                            ?>
                            <?php Pjax::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//use yii\helpers\Html;
//use yii\grid\GridView;
//use yii\widgets\Pjax;
///* @var $this yii\web\View */
///* @var $searchModel backend\models\UsersSearch */
///* @var $dataProvider yii\data\ActiveDataProvider */
//
//$this->title = 'User Management';
//$this->params['breadcrumbs'][] = $this->title;
//$this->registerCssFile(Yii::getAlias('@web/'). 'css/style-grid.css', ['depends'=>['backend\assets\AppAsset']]); 
?>
<!--
<div class="portlet light portlet-fit bordered">
    <div class="portlet-title">
        <div class="caption">
<?= Html::encode($this->title) ?>
        </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="javascript:;" class="remove"> </a>
            </div>
    </div>
    <div class="portlet-body">

<?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
<?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-primary']) ?>
        </p>

<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'name',
        // 'user_type',
        'email:email',
        //'login_failed',
        //'last_login_attempt',
        //'penalty_time',
        //'created_date',
        //'updated_date',
        //'auth_key',
        // 'phone_number',
        [
            'label' => 'Created By',
            'attribute' => 'created_by_name',
        ],
        [
            'attribute' => 'created_date',
            'value' => function($model)
            {
                return \backend\components\Helper::dateTimeFormat($model['created_date']);
            },
            'filterInputOptions' => [
                'class' => 'form-control date-picker',
                'data-date-format' => "yyyy-mm-dd",
                'placeholder' => 'YYYY-MM-DD'
            ],
        ],
        [
            'label' => 'Status',
            'attribute' => 'is_active',
            // 'filter' => \kartik\select2\Select2::widget([
            //     'model' => $searchModel,
            //     'attribute' => 'is_active',
            //     'data' => [0 => 'Inactive', 1 => 'Active'],
            //     'options' => [
            //         'placeholder' => 'All',
            //     ],
            //     'pluginOptions' => [
            //         'allowClear' => true
            //     ],
            // ]),
            'filter' => [0 => 'Inactive', 1 => 'Active'],
            'value' => function($model)
            {
                if ($model->is_active == 0) {
                    $isActive = 'Inactive';
                } else
                    $isActive = 'Active';

                return $isActive;
            },
            'filterInputOptions' => [
                'class' => 'form-control text-center',
                'prompt' => 'All'
            ],
            'headerOptions' => ['width' => '8%'],
            'contentOptions' => function ($model, $key, $index, $column)
            {

                if ($model->is_active == 0) {
                    $isActive = ['style' => 'text-align: center; color:red;'];
                } else {
                    $isActive = ['style' => 'text-align: center; color:green; font-style:italic;'];
                }

                return $isActive;
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Action',
            'headerOptions' => ['style' => 'color: #337ab7;text-align: center;'],
            'contentOptions' => ['style' => 'text-align: center;'],
            'template' => '{activate}',
            'buttons' => [
                'activate' => function ($url, $model)
                {
                    if ($model->is_active == 1) {
                        return Html::a(
                                        '<button type="button" class="btn btn-sm btn-danger btn-xs">Inactive</button>', $url, [
                                    'title' => 'Inactive',
                                    'data-pjax' => '0',
                                    'data' => [
                                        'confirm' => 'Are you sure to deactivate this User?',
                                        'method' => 'post',
                                    ]
                                        ]
                        );
                    } else {
                        return Html::a(
                                        '<button type="button" class="btn btn-sm btn-primary btn-xs">
                                        <span>Activate</span>
                                    </button>', $url, [
                                    'title' => 'Activate',
                                    'data-pjax' => '0',
                                    'data' => [
                                        'confirm' => 'Are you sure to activate this User?',
                                        'method' => 'post',
                                    ]
                                        ]
                        );
                    }
                },
            ],
            'visible' => Yii::$app->user->can('super_admin')
        ],
        // 'merchant_id',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}{update}',
            'contentOptions' => ['style' => 'text-align: center;width:10%'],
            // 'header'=>'Actions',
            'buttons' => [
                'view' => function ($url, $data)
                {
                    $url = '/admin/user-management/view?id=' . $data->user_id;
                    return Html::a(
                                    '<button type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-eye-open"></i></button>', $url, [
                                // 'data-pjax' => '0',
                                'title' => 'View',
                                'data' => [
                                // 'method' => 'post',
                                ]
                                    ]
                    );
                },
                'update' => function ($url, $data)
                {
                    $url = '/admin/user-management/update?id=' . $data->user_id;
                    return Html::a(
                                    '<button type="button" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-pencil"></i></button>', $url, [
                                // 'data-pjax' => '0',
                                'title' => 'Update',
                                'data' => [
                                // 'method' => 'post',
                                ]
                                    ]
                    );
                },
            ],
            'visible' => Yii::$app->user->can('super_admin')
        ],
    ],
]);
?>
<?php Pjax::end(); ?>
    </div>
</div>-->
