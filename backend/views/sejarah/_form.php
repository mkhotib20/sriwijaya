<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Sejarah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sejarah-form">
<style>
.datePick{
    cursor: pointer;
}
.ui-datepicker-year{
    border: none;
    background-color: transparent;
    cursor: pointer;
}
</style>
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

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tanggal')->textInput(['class' => 'form-control datePick', 'readonly' => 'true']) ?>
    <?= $form->field($model, 'deskripsi')->textarea(['rows' => 6]) ?>
    <?= $form->field($fileUpload, 'imageFile')->fileInput(['class'=> 'dropify', 'hidden', 'data-default-file' => '/storage/sejarah/'.$model->img]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
</script>
<?php $this->registerJs("
    $('.datePick').datepicker({
        showMonthAfterYear: false,
        changeYear: true,
        yearRange: '-30:+10',
        dateFormat: 'yy-m-dd',

    });
", \yii\web\View::POS_END) ?>