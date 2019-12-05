<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JadwalGuru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jadwal-guru-form">

    <?php  $form = ActiveForm::begin([
        'id' => 'formClient',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'offset' => 'col-sm-offset-4',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
            'options' => ['class' => 'form-group row']
        ],
    ]); ?>

    <?= $form->field($model, 'guru')->textInput() ?>

    <?= $form->field($model, 'jam')->dropDownList($jam, ['class' => 'form-control']); ?>
    <?= $form->field($model, 'day')->dropDownList($days, ['class' => 'form-control']); ?>

    <?= $form->field($model, 'isAvailable')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
