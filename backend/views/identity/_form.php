<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;


?>

<div class="identity-form">

    <?php $form = ActiveForm::begin([
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

    <?= $form->field($model, 'iden_name')->textInput(['maxlength' => true, 'autofocus' => true, 'oninput' => 'gen(this)']) ?>
    <?= $form->field($model, 'iden_key')->textInput(['maxlength' => true, 'readonly' => true]) ?>
    <?= $form->field($model, 'iden_content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function gen(val) {
        var key = document.getElementById("identity-iden_key")

        key.value = val.value.toLowerCase().replace(/\ /g, '_')
    }
</script>