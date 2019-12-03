<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Guru */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usia')->textInput() ?>

    <?= $form->field($model, 'mengajar')->dropDownList($kursus, ['class' => 'form-control']); ?>
    <?= $form->field($fileUpload, 'imageFile')->fileInput(['class'=> 'dropify', 'hidden', 'data-default-file' => '/storage/guru/'.$model->img]) ?>
    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
