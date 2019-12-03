<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kursus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kursus-form">

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

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tarif')->textInput() ?>

    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>


    <?= $form->field($fileUpload, 'imageFile')->fileInput(['class'=> 'dropify', 'hidden', 'data-default-file' => '/storage/kursus/'.$model->img]) ?>

    <?= $form->field($model, 'kategori')->dropDownList($kategori, ['class' => 'form-control']); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
