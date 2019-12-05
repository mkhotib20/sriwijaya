<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlatMusik */

$this->title = 'Jadwal '. $guru->nama;
$this->params['breadcrumbs'][] = ['label' => 'List Guru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alat-musik-view">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Tambahkan Penghargaan</h4>
                <div class="table-responsive">
                    <table class="table table-hovered">
                        <thead>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                            <?php  $form = ActiveForm::begin(); ?>
                            <div class="form-group">
                            </div>
                            <?= $form->field($model, 'isAvailable')->textInput(['type' => 'hidden', 'value' => 1])->label(false); ?>
                            <?= $form->field($model, 'guru')->textInput(['type' => 'hidden', 'value' => $id])->label(false); ?>
                            <td><?= $form->field($model, 'day')->dropDownList($days, ['class' => 'form-control'])->label(false); ?></td>
                                <td><?= $form->field($model, 'jam')->dropDownList($jam, ['class' => 'form-control'])->label(false); ?></td>
                                <td><button type="submit" class="btn btn-primary"><i class="fe-plus"></i></button></td>
                            </tr>
                        <?php ActiveForm::end(); ?>
                        <?php foreach($jadwal as $key => $value){?>
                            <tr id="row_<?=$value['id']?>" >
                                <td><?= $value['namaHari'] ?></td>
                                <td><?= $value['namaJam'] ?></td>
                                <td><button onclick="delPenghargaan(<?= $value['id'] ?>)" class="btn btn-danger"><i class="fe-x"></i></button></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
