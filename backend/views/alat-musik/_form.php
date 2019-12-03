<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model backend\models\AlatMusik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alat-musik-form">
 <?php 
 $options = [0 =>'Tidak', 1=>'Iya'];
 $form = ActiveForm::begin([
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

    <?= $form->field($model, 'harga_dasar')->textInput() ?>

    <?= //$form->field($model, 'is_diskon')->textInput()
        $form->field($model, 'is_diskon')->dropDownList($options, ['class' => 'form-control'])->label('Apakah Diskon ?');
     ?>

    <?= $form->field($model, 'harga_final')->textInput() ?>


    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>

    <?= $form->field($fileUpload, 'imageFile')->fileInput(['class'=> 'dropify', 'hidden', 'data-default-file' => '/storage/alat-musik/'.$model->img]) ?>

    <?= $form->field($model, 'kategori')->dropDownList($kategori, ['class' => 'form-control']); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
