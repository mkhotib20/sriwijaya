<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Client */
/* @var $form yii\widgets\ActiveForm */

$style = <<< CSS
    .disabled-select {
        background-color: #d5d5d5;
        opacity: 0.5;
        border-radius: 3px;
        cursor: not-allowed;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
    }

    select[readonly].select2-hidden-accessible + .select2-container {
        pointer-events: none;
        touch-action: none;
    }

    select[readonly].select2-hidden-accessible + .select2-container .select2-selection {
        background: #eee;
        box-shadow: none;
    }

    select[readonly].select2-hidden-accessible + .select2-container .select2-selection__arrow,
    select[readonly].select2-hidden-accessible + .select2-container .select2-selection__clear {
        display: none;
    }

CSS;
$this->registerCss($style);
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
                    <div class="col-md-8">
                        <div class="client-form">

                            <?php
                            $form = ActiveForm::begin([
                                        'layout' => 'horizontal',
                                        'fieldConfig' => [
                                            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                            'horizontalCssClasses' => [
                                                'label' => 'col-sm-3',
                                                'offset' => 'col-sm-offset-4',
                                                'wrapper' => 'col-sm-6',
                                                'error' => '',
                                                'hint' => '',
                                            ],
                                            'options' => ['class' => 'form-group row']
                                        ],
                            ]);
                            ?>

                            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm']) ?>

                            <?= $form->field($model, 'email'/*, ['enableAjaxValidation' => true]*/)->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm']) ?>
                            <?php if ($model->isNewRecord) { ?>
                                <?= $form->field($model, 'password')->passwordInput(['value' => '', 'maxlength' => true, 'class' => 'form-control form-control-sm']) ?>

                                <?= $form->field($model, 'password_confirm')->passwordInput(['value' => '', 'maxlength' => true, 'class' => 'form-control form-control-sm']) ?>
                            <?php } ?>
                            <?= $form->field($model, 'user_telegram')->textInput(['maxlength' => true, 'class' => 'form-control form-control-sm']) ?>
                            <div class="form-group">
                                <label class="control-label col-sm-3"></label>
                                <div class="col-sm-6">
                                    <?=
                                    Html::a('<span class="btn-label"><i class="glyphicon glyphicon-chevron-left"></i></span>Cancel', ['/admin/user-management/index'], [
                                        'class' => 'btn btn-labeled btn-info m-b-5 pull-left',
                                        'title' => 'Cancel'
                                    ])
                                    ?>&nbsp;

                                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                                </div>
                            </div>&nbsp;

                            <?php ActiveForm::end(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
