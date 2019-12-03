<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Users;

$this->title = 'Assignment';
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
            <div class="card-header"> 
                <h4 class="card-title">
                    <?= Html::encode($this->title) ?> 
                </h4>
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
                                        'contentOptions' => ['style' => 'text-align:center;'],
                                    ],
                                    [
                                        'attribute' => 'name',
                                        'filterInputOptions' => [
                                            'class' => 'form-control form-control-sm',
                                        ],
//                                                'filter' => Html::activeDropDownList($searchModel, 'name', array('' => 'All') + Users::findAvailable('name'), [
//                                                    'class' => 'form-control select2',
//                                                    'data-plugin' => 'select2',
//                                                ]),
                                    ],
                                    [
                                        'attribute' => 'email',
                                        'filterInputOptions' => [
                                            'class' => 'form-control form-control-sm',
                                        ],
                                    ],
                                    [
                                        'label' => 'User Type',
                                        'attribute' => 'user_type',
                                        'filter' => array('super_admin' => 'Super Admin', 'admin' => 'Admin', 'user_client' => 'User Client'),
                                        'filterInputOptions' => [
                                            'class' => 'form-control select2',
                                            'data-plugin' => 'select2',
                                        ],
                                        'value' => function ($model)
                                        {
                                            switch ($model->user_type) {
                                                case 'super_admin':
                                                    return 'Super Admin';
                                                    break;
                                                case 'admin':
                                                    return 'Admin';
                                                    break;
                                                case 'user_client':
                                                    return 'User Client';
                                                    break;
                                                default:
                                                    '-';
                                            }
                                        }
                                    ],
                                    
                                    [
                                        'class' => 'backend\components\ActionColumn',
                                        'template' => '{view} {update} {delete}',
                                        'header'=> "Pilihan"
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
