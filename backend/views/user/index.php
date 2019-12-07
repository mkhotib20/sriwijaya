<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMusik */

$this->title = 'Ganti password';
// $this->params['breadcrumbs'][] = ['label' => '', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-musik-create">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h4>User : <?= $model->_user->username; ?></h4>
                <div class="card-body">
                    <?php  $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'password_confirmation')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>